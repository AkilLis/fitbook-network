<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests;
use App\User;
use View;
use Response;
use Session;
use Mail;
use DB;

class AdminController extends Controller
{
	public function create(Request $request)
	{
		/*if($request->search)
		{
            \Log::info('Request = '. $request);
			$searchValue = $request->search;  
			try
			{
                \Log::info('SeachText = '.$searchValue);
				$filteredUsers = User::where('userId', 'like', "%$searchValue%")
					->orWhere('fName', 'like', "%$searchValue%")
                    ->orWhere('lName', 'like', '%$searchValue%')  
                    ->take(5)
                    ->get();
                \Log::info('Datas = '. $filteredUsers);
			}
			catch(ModelNotFoundException $ex)
			{
				return Response::json([
        			'gotinfo' => 'failed',
    			]);	
			}

   			return Response::json([
   	    		'gotinfo' => 'success',
                'users' => $filteredUsers,
    		]);
		//}

		return Response::json([
        		'gotinfo' => 'failed',
    	]);*/
	}

    public function index(Request $request)
    {
    	$input = $request->all();
       // $users = User::all();
        
        $search = "";

        if($request->get('search'))
        {
        	$search = $request->get('search');     
            $users = DB::table('users')
                ->leftJoin('role_user','users.id','=','role_user.user_id')
                ->orderBy('users.created_at', 'DESC')
                ->select('users.id', 'users.userId', 'users.fName', 'users.lName', 'users.isNetwork', DB::raw('CASE WHEN role_user.user_id IS NULL THEN 0 ELSE 1 END AS registration'))
                ->paginate(10);
        } 
        else
        {
            $users = DB::table('users')
                ->leftJoin('role_user','users.id','=','role_user.user_id')
                ->orderBy('users.created_at', 'DESC')
                ->select('users.id', 'users.userId', 'users.fName', 'users.lName', 'users.isNetwork', DB::raw('CASE WHEN role_user.user_id IS NULL THEN 0 ELSE 1 END AS registration'))
                ->paginate(10);
        }

        $request->flash();
		//return response($users);
        return View::make('admin/users')->with('users', $users)->with('search', $search);
    }


    public function store(Request $request)
    {
    		$messages = [
		        'fName.required' => 'Хэрэглэгчийн овог оруулна уу',
		        'lName.required' => 'Хэрэглэгчийн нэр оруулна уу',
		        'email.required' => 'И-мэйл хаяг оруулна уу',
		        'registryNo.required' => 'Регистрийн дугаар оруулна уу',
		        'accountId.required' => 'Дансны дугаар оруулна уу',
		    ];


    		$validator = Validator::make($request->all(), [
            	'fName' => 'required',
            	'lName' => 'required',
            	'email' => 'required|email|unique:users',
            	'registryNo' => 'required',
            	'accountId' => 'required'
        	], $messages);	

        	if ($validator->fails()) 
        	{
        		return Response::json(array('errors' => $validator->errors()->toArray()));
        	}

        	$planPassword = $request->phone;
        	$tranToken = rand(1000, 9999);
			$password = \Hash::make($planPassword);

        	$newUser = array(
                ['userId' => $request->userId,'fName' => $request->fName, 'lName' => $request->lName, 'email' => $request->email, 'address' => $request->address
                , 'password' => $password, 'phone' => $request->phone,'registryNo' => $request->registryNo, 'accountId' => $request->accountId, 'isNetwork' => 'N', 'tranToken', $tranToken]
        	);

            foreach ($newUser as $user)
	        {
	            User::create($user);
	        }

	       /* Mail::send('emails.test', ['name' => 'Tuvshinbat'], function($message) {
			    $message->to('g.tuvshinbat@yahoo.com', 'Fitbook Team')->from('fitbooknetwork@gmail.com')->subject('Email Testing from Fitbook Team');
			});*/

            // redirect
           // Session::flash('message', 'Амжилттай бүртгэлээ!');
            return Response::json($newUser);
    }
}
