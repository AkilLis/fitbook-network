<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\User;
use View;
use Response;
use Session;

class AdminController extends Controller
{
	public function create(Request $request)
	{
		//СҮҮЛД ДУГААРЫГ НЬ НЭМЖ ХАРУУЛЖ МАГАДГҮЙ
	}

    public function index(Request $request)
    {
    	$input = $request->all();
        $users = User::all();
        
        $search = "";

        if($request->get('search'))
        {
        	$search = $request->get('search');     
            $users = User::where('lName', 'like', "%$search%")
			    ->orWhere('fName', 'like', "%$search%")
			    ->orWhere('userId', 'like', "%$search%")
			    ->paginate(6);
        } 
        else
        {
			$users = User::paginate(6);
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
        		return Response::json($response);
        	}

        	$planPassword = rand(1000,9999);
			$password = \Hash::make($planPassword);

        	$newUser = array(
                ['userId' => $request->userId,'fName' => $request->fName, 'lName' => $request->lName, 'email' => $request->email, 'address' => $request->address
                , 'password' => $password, 'phone' => $request->phone,'registryNo' => $request->registryNo, 'accountId' => $request->accountId, 'isNetwork' => 'Y']
        	);

            foreach ($newUser as $user)
	        {
	            User::create($user);
	        }

            // redirect
           // Session::flash('message', 'Амжилттай бүртгэлээ!');
            return Response::json($newUser);
    }
}
