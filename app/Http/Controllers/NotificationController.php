<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;
use App\Http\Requests;
use App\Notification;
use App\User;
use View;
use Response;
use Session;
use Mail;
use DB;

class NotificationController extends Controller
{
	public function create(Request $request)
	{

	}

    public function index(Request $request)
    {
        $notifications = Notification::where('user_id','=',$request->user()->id)->paginate(5);
        return Response::json($notifications);
    }

    public function store(Request $request)
    {

    }
}
