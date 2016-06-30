<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Transactions;
use App\User;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mail;
use Response;
use Session;
use View;

class CashController extends Controller
{
	public function create(Request $request)
	{
		
	}

    public function index(Request $request)
    {
        $query = Auth::user()->transactions();
        if($request->type != "All")
            $query->where('invType', '=', $request->type);

        $query->orderBy('created_at', 'DESC');
        $transactions = $query->paginate(5);
        /*$transactions = Auth::user()->with('transactions')->where('invType', '=', $request->type);*/
        return Response::json($transactions);
    }

    public function show(Request $request, $cashType)
    {
        $query = Auth::user()->inTransactions();
        if($cashType != "All")
        {
            if($cashType == "CashLoad")
                $query->where('invType', '=', "CashLoad");
            else
            {
                $query->where('invType', '<>', "CashLoad");
                $query->where('outAmt', '<>', 0);
            }
        }
        else
            $query->where('outAmt', '<>', 0);

        $query->orderBy('created_at', 'DESC');
        $transactions = $query->get();

        foreach ($transactions as $tran) {
            $tran->outUser;
        }

        return Response::json($transactions);
    }

    public function store(Request $request)
    {
    		
    }
}
