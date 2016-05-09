<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    //
    public function activateUser(Request $request)
    {
        /*pUserId INT(20), 
        IN pBlockId BIGINT(20), 
        IN pParentId int(20),
        IN pAmount decimal(24,6),
        IN pRankId INT(20), 
        OUT isDevide CHAR(1),
        OUT OutUserId INT(20),
        OUT OutBlockId INT(20), 
        OUT OutParentId int(20)*/
        
        $rankId = 1;
        $parenId = $request->parentId;
        $userId = $request->id;

        $blockId = DB::table('userblockmap')
            ->join('block', 'userblockmap.blockId', '=', 'block.id')
            ->where('userblockmap.userId','=', $parenId)
            ->where('block.groupId', '=', $rankId)
            ->select('userblockmap.blockId');

        \Log::info('test = '.'gotIt');


        /*DB::statement('call network_calculation("'+$userId+'", "'+$blockId+'","'+$parenId+'","500000","'+$rankId+'",
            "'+$isDevide+'","'+$outUserId+'","'+$outBlockId+'","'+$outParentId+'")');*/
       
        return Response::json(null);
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

        if(!$accountsEndAmount)
        {
            $accountsEndAmount = array(['cashEnd' => 0, 'awardEnd' => 0, 'savingEnd' => 0, 'usageEnd' => 0, 'bonusEnd' => 0]);
            //$accountsEndAmount[0] = (object) $accountsEndAmount[0];
            //\Log::info('cash end =  '. $accountsEndAmount[0]['cashEnd']);
        }    

        //\Log::info('Account Infos: ', $accountsEndAmount[0]);

        return \View::make('dashboard')->with('accounts', $accountsEndAmount[0]);
    }
}
