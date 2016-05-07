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

    public function dashboard(Request $request)
    {
    	$userId = \Auth::user()->userId;
		$id = \Auth::user()->id;
		\Log::info('UserId =: '.$userId);
    	$accountsEndAmount = \DB::table('users')
            ->join('UserAccountMap', 'users.id', '=', 'UserAccountMap.userId')
            ->leftJoin('AwardAccount', 'UserAccountMap.accountId', '=', 'AwardAccount.id')
            ->leftJoin('BonusAccount', 'UserAccountMap.accountId', '=', 'BonusAccount.id')
            ->leftJoin('CashAccount', 'UserAccountMap.accountId', '=', 'CashAccount.id')
            ->leftJoin('UsageAccount', 'UserAccountMap.accountId', '=', 'UsageAccount.id')
            ->leftJoin('SavingAccount', 'UserAccountMap.accountId', '=', 'SavingAccount.id')
            ->select(\DB::raw('sum(AwardAccount.endAmount), sum(BonusAccount.endAmount), sum(CashAccount.endAmount), sum(UsageAccount.endAmount),
            	sum(SavingAccount.endAmount)'))
            ->where('users.id', '=', $id)
            ->groupBy('users.id')
            ->get();

        \Log::info('Account Infos: ', $accountsEndAmount);

        return \View::make('dashboard');
    }
}
