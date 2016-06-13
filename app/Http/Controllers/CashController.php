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
use App\Transactions;

class CashController extends Controller
{
	public function create(Request $request)
	{
		
	}

    public function show(Request $request, $cashType)
    {
        $query = DB::table('transactions')
            ->join('users','transactions.inUserId','=','users.id')
            ->where('transactions.outUserId', '=', \Auth::user()->id);

        if($cashType != "All")
        {
            $query->where('transactions.invType','=',$cashType);
        }

        if($request->get('search'))
        {
            $search = $request->get('search'); 
            $query->orWhere('users.fName', 'like', "%$search%")
                    ->orWhere('users.lName', 'like', "%$search%")
                    ->orWhere('users.userId', 'like', "%$search%")
                    ->orderBy('transactions.invDate', 'DESC')
                    ->select('users.id', 'users.userId', 'users.fName', 'users.lName', 'transactions.outAmt', 'transactions.invDate', 'transactions.invType');      
        }
        else
        {
                $query->orderBy('transactions.invDate', 'DESC')
                    ->select('users.id', 'users.userId', 'users.fName', 'users.lName', 'transactions.outAmt', 'transactions.invDate', 'transactions.invType')
                    ->paginate(10);
        }

        $users = $query->get();

        return Response::json($users);
    }

    public function store(Request $request)
    {
    		
    }
}
