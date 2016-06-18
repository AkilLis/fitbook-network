<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;
use App\Http\Requests;
use App\User;
use View;
use Response;
use Session;
use Mail;
use DB;
use Carbon;

class AdminController extends Controller
{
	public function create(Request $request)
	{        
        $nextId = $this->generateId();
        $maxId = User::where('userId','like', "$nextId%")
              ->orderBy('userId', 'DESC')
              ->first();

        if($maxId){
            $maxId = substr($maxId->userId, strlen($maxId->userId) - 2, strlen($maxId->userId)) + 1;
            $nextId .= $maxId < 10 ? ('0'.$maxId) : $maxId;
        }
        else{
            $nextId .= "01";
        }

        return Response::json([
            'status' => 'success',
            'nextId' => $nextId,
        ]);
		
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
                ->where('lName', 'like', "%$search%")
                ->orWhere('fName', 'like', "%$search%")
                ->orWhere('userId', 'like', "%$search%")
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
            	'registryNo' => 'required',
        	], $messages);	

        	if ($validator->fails()) 
        	{
        		return Response::json(array('errors' => $validator->errors()->toArray()));
        	}

        	$planPassword = substr($request->userId, 10, 12);
        	$tranToken = substr($request->userId, 8, 12);
            \Log::info('trantoken = '.$tranToken);
			$password = \Hash::make($planPassword);

        	$newUser = array(
                ['userId' => $request->userId,'fName' => $request->fName, 'lName' => $request->lName, 'email' => $request->email, 'address' => $request->address
                , 'password' => $password, 'phone' => $request->phone,'registryNo' => $request->registryNo, 'accountId' => $request->accountId, 'isNetwork' => 'N', 'tranToken' => $tranToken]
        	);

            foreach ($newUser as $user)
	        {
	            User::create($user);
	        }

            return Response::json($newUser);
    }

    private function generateId()
    {
        $now = Carbon::now;
        $nextId = "FG";
        $nextId .= substr($now->year, 2 , 4);
        $nextId .= $now->month < 10 ? ('0'.$now->month) : $now->month;
        $nextId .= $now->day < 10 ? ('0'.$now->day) : $now->day;
        $nextId .= \Auth::user()->regId; 
        return $nextId;
    }
}
