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
		$id = \Auth::user()->id;
    	$accountsEndAmount = \DB::table('users')
            ->join('UserAccountMap', 'users.id', '=', 'UserAccountMap.userId')
            ->leftJoin('AwardAccount', 'UserAccountMap.accountId', '=', 'AwardAccount.id')
            ->leftJoin('BonusAccount', 'UserAccountMap.accountId', '=', 'BonusAccount.id')
            ->leftJoin('CashAccount', 'UserAccountMap.accountId', '=', 'CashAccount.id')
            ->leftJoin('UsageAccount', 'UserAccountMap.accountId', '=', 'UsageAccount.id')
            ->leftJoin('SavingAccount', 'UserAccountMap.accountId', '=', 'SavingAccount.id')
            ->select(\DB::raw('round(sum(AwardAccount.endAmount), 2) as awardEnd, round(sum(BonusAccount.endAmount), 2) as bonusEnd, round(sum(CashAccount.endAmount), 2) as cashEnd, round(sum(UsageAccount.endAmount), 2) as usageEnd,
            	round(sum(SavingAccount.endAmount), 2) as savingEnd'))
            ->where('users.id', '=', $id)
            ->groupBy('users.id')
            ->get();

        \Log::info('Account Infos: ', $accountsEndAmount);

        return \View::make('dashboard')->with('accounts', $accountsEndAmount[0]);
    }
}
