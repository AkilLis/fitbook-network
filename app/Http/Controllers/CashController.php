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

class CashController extends Controller
{
	public function create(Request $request)
	{
		
	}

    public function index(Request $request)
    {
		//return response($users);
        return View::make('admin/cash');
    }


    public function store(Request $request)
    {
    		
    }
}
