<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use View;

class AdminController extends Controller
{
    //
    public function allUsers(Request $request)
    {
       $users = User::all();
       return View::make('admin/users')->with('users', $users);
      // return view('users');       
    }
}
