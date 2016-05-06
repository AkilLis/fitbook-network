<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    //
    public function AddUser(Request $request)
    {
    	Auth::logout();
        //unset($user->password);
        //return view('auth.login',[]);
        return redirect()->intended('/');
    }
}
