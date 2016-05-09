<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use DB;
use Response;

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
        $parentId = User::where('userId', '=', $request->parentId)->first()->id;
        $userId = User::where('userId', '=', $request->id)->first()->id;

        \Log::info('id = '. $userId);
        \Log::info('parentId = '. $parentId);

        $blockId = DB::table('userblockmap')
            ->join('block', 'userblockmap.blockId', '=', 'block.id')
            ->where('userblockmap.userId','=', $parentId)
            ->where('block.groupId', '=', $rankId)
            ->select('userblockmap.blockId as blockId')
            ->first();

        \Log::info('test = '. $blockId->blockId);

        DB::statement('CALL network_calculation(:userId, :blockId, :parentId, :amount, :rankId, @isDevide, @outUserId, @outBlockId, @outParentId);',
            array(
                $userId,
                $blockId->blockId,
                $parentId,
                500000,
                $rankId
            )
        );

        $results = DB::select('select @isDevide as isDevide, @outUserId as userId, @outBlockId as blockId, @outParentId as parentId');

        if($response->isDevide == 'Y')
        {
            DB::statement('CALL network_calculation(:userId, :blockId, :parentId, :amount, :rankId, @isDevide, @outUserId, @outBlockId, @outParentId);',
                array(
                    $userId,
                    $blockId->blockId,
                    $parentId,
                    500000,
                    $rankId
                )
            );
        }    

        \Log::info('response = ', $results);
        return Response::json(null);
    }

    public function dashboard(Request $request)
    {
		$id = \Auth::user()->id;
        //Дансны мэдээлэл
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

        //Блокын мэдээлэл
        $myBlock = \DB::table('userblockmap')
            ->join('block','userblockmap.blockId','=','block.id')
            ->where('block.groupId','=', 1)
            ->first();

        $blockUsers = \DB::table('userblockmap')
            ->join('users','userblockmap.userId','=','users.id')
            ->orderBy('userblockmap.fCount','users.created_at DESC')
            ->select('users.id','users.userId','users.fName','users.lName', 'userblockmap.fCount')
            ->get();
    

        \Log::info('Block : '.count($blockUsers));

        $emptyUsers = 16 - count($blockUsers);

        return \View::make('dashboard')->with('accounts', $accountsEndAmount[0])
                                       ->with('blockUsers', $blockUsers)
                                       ->with('emptyUsers', $emptyUsers);

    }
}
