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
        $rankId = 1;
        $parentId = User::where('userId', '=', $request->parentId)->first()->id;
        $userId = User::where('userId', '=', $request->id)->first()->id;
        $currentBlock = $blockId = DB::table('userblockmap')
            ->join('block', 'userblockmap.blockId', '=', 'block.id')
            ->where('userblockmap.userId','=', $parentId)
            ->where('block.groupId', '=', $rankId)
            ->select('userblockmap.blockId as blockId')
            ->first()->blockId;

        $isDevide = 'Y';

        while ($isDevide == 'Y') {

            \Log::info('id = '.$userId);
            \Log::info('blockId = '.$currentBlock);
            \Log::info('parent = '.$parentId);

            DB::statement('CALL network_calculation(:userId, :blockId, :parentId, :amount, :rankId, @isDevide, @outUserId, @outBlockId);',
                array(
                    $userId,
                    $currentBlock,
                    $parentId,
                    $rankId == 1 ? 600000 : 1200000,
                    $rankId
                )
            );

            $results = DB::select('select @isDevide as isDevide, @outUserId as userId, @outBlockId as blockId');
            \Log::info('responsese = ', $results);
            $userId = $results[0]->userId;
            $isDevide = $results[0]->isDevide;


            if($isDevide == 'N') return Response::json(null);

            $currentBlock = $results[0]->blockId;
            $parentId = DB::table('userblockmap')
                    ->where('userblockmap.userId','=', $results[0]->userId)
                    ->select('userblockmap.parentId')
                    ->first()->parentId;
        }

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
            ->select(\DB::raw('round(sum(AwardAccount.endAmount), 0) as awardEnd, round(sum(BonusAccount.endAmount), 0) as bonusEnd, round(sum(CashAccount.endAmount), 0) as cashEnd, round(sum(UsageAccount.endAmount), 0) as usageEnd,
            	round(sum(SavingAccount.endAmount), 0) as savingEnd'))
            ->where('users.id', '=', $id)
            ->groupBy('users.id')
            ->get();

        \Log::info('useRId = '.$id);
        //Яг одоо идвэхтэй блок, ахисан шат сүүлд шалгана     
        $condition = ['userblockmap.userId' => $id, 'block.isActive' => 'Y'];

        $blockId = \DB::table('userblockmap')
            ->join('block','block.id','=','userblockmap.blockId')
            ->where($condition)
            ->first();

        $condition = ['block.id' => $blockId->blockId, 'block.isActive' => 'Y'];

        //Блокын ахлагчыг тусд нь олно 
        $capUser = \DB::table('userblockmap')
        ->join('users', 'userblockmap.userId','=','users.id')
        ->join('block', function ($join) {
            $join->on('block.id', '=', 'userblockmap.blockId')
                 ->on('block.U1', '=', 'userblockmap.userId');
        })
        
        ->where($condition)
        ->select('users.id','users.userId','users.fName','users.lName', 'userblockmap.fCount')
        ->first();          

        \Log::info('Caps : '. $capUser->fCount);

        $blockUsers = \DB::table('userblockmap')
            ->join('users','userblockmap.userId','=','users.id')
            ->join('block','block.id','=','userblockmap.blockId')
            ->where('users.id','<>', $capUser->id)
            ->where('userblockmap.blockId','=',$blockId->blockId)
            ->where('block.isActive','=','Y')
            ->orderBy('userblockmap.fCount', 'DESC')
            ->orderBy('users.created_at', 'ASC')
            ->select('users.id','users.userId','users.fName','users.lName', 'userblockmap.fCount')
            ->get();
         

        \Log::info('Block : '.count($blockUsers));

        $emptyUsers = 15 - count($blockUsers);

        return \View::make('dashboard')->with('accounts', $accountsEndAmount[0])
                                       ->with('blockUsers', $blockUsers)
                                       ->with('emptyUsers', $emptyUsers)
                                       ->with('capUser', $capUser);

    }
}
