<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\AwardAccount;
use App\BonusAccount;
use App\CashAccount;
use App\UsageAccount;
use App\SavingAccount;
use DB;
use Response;

class UserController extends Controller
{
    //ХЭРЭГЛЭГЧ ИДЭВХЖҮҮЛЭХ
    public function activateUser(Request $request)
    {
        $cashAmount = $request->cashAmount;
        $awardAmount = $request->awardAmount;
        $bonusAmountBg = $request->bonusAmountBg;
        $bonusAmountAd = $request->bonusAmountAd; 
        $rankId = $request->rank ? 1 : 2;

        \Log::info('userbonusBg = '. $bonusAmountBg);
        \Log::info('userbonusAd = '. $bonusAmountAd);
            
        $bonusId = DB::table('useraccountmap')
        ->where('useraccountmap.userId','=', \Auth::user()->id)
        ->where('useraccountmap.type','=', 3)
        ->select('useraccountmap.accountId')
        ->first();

        $account = CashAccount::find($bonusId->accountId);

        if($account->endAmount < $cashAmount)
        {
            return Response::json(['status' => '_amount']);
        }

        $bonusId = DB::table('useraccountmap')
        ->where('useraccountmap.userId','=', \Auth::user()->id)
        ->where('useraccountmap.type','=', 1)
        ->select('useraccountmap.accountId')
        ->first();


        $account = AwardAccount::find($bonusId->accountId);

        if($account->endAmount < $awardAmount)
        {
            return Response::json(['status' => '_amount']);
        }

        if($bonusAmountBg != 0)
        {
            $bonusId = DB::table('useraccountmap')
            ->where('useraccountmap.userId','=', \Auth::user()->id)
            ->where('useraccountmap.type','=', 2)
            ->where('useraccountmap.groupId','=', 1)
            ->select('useraccountmap.accountId')
            ->first();


            $account = BonusAccount::find($bonusId->accountId);

            \Log::info('BonusBeginnerEnd = '. $account->endAmount);

            if($account->endAmount < $bonusAmountBg)
            {
                return Response::json(['status' => '_amount']);
            }
        }
        
        if($bonusAmountAd != 0)
        {
            $bonusId = DB::table('useraccountmap')
            ->where('useraccountmap.userId','=', \Auth::user()->id)
            ->where('useraccountmap.type','=', 2)
            ->where('useraccountmap.groupId', '=', 2)
            ->select('useraccountmap.accountId')
            ->first();

            $account = BonusAccount::find($bonusId->accountId);

            \Log::info('BonusAdvancedEnd = '. $account->endAmount);

            if($account->endAmount < $bonusAmountAd)
            {
                return Response::json(['status' => '_amount']);
            }
        }

        $parentId = User::where('userId', '=', $request->parentId)->first()->id;
        $userId = User::where('userId', '=', $request->id)->first()->id;

        $currentBlock = DB::table('userblockmap')
            ->join('block', 'userblockmap.blockId', '=', 'block.id')
            ->where('userblockmap.userId','=', $parentId)
            ->where('userblockmap.rankId', '=', $rankId)
            ->select('userblockmap.blockId')
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
            $userId = $results[0]->userId;
            $isDevide = $results[0]->isDevide;


            if($isDevide == 'N') break;

            $currentBlock = $results[0]->blockId;
            $parentId = DB::table('userblockmap')
                    ->where('userblockmap.userId','=', $results[0]->userId)
                    ->select('userblockmap.parentId')
                    ->first()->parentId;
        }


       
        //ДАНСНААС НЬ МӨНГӨ ХЭСЭХ
        if($cashAmount != 0)
            $this->subractCashAccount(\Auth::user()->id, $cashAmount);
        if($awardAmount != 0)
            $this->subractAwardAccount(\Auth::user()->id, $awardAmount);
        
        if($bonusAmountBg != 0)
            $this->subractBonusAccount(\Auth::user()->id, $bonusAmountBg, 1);
        if($bonusAmountAd != 0)
            $this->subractBonusAccount(\Auth::user()->id, $bonusAmountAd, 2);

        return Response::json(['status' => 'success']);
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

        //Яг одоо идвэхтэй блок, ахисан шат сүүлд шалгана     
        $condition = ['userblockmap.userId' => $id, 'block.isActive' => 'Y'];

        $blockId = \DB::table('userblockmap')
            ->join('block','block.id','=','userblockmap.blockId')
            ->where($condition)
            ->first();

        //Блокын ахлагчыг тусд нь олно 
        $capUser = \DB::table('userblockmap')
        ->join('users', 'userblockmap.userId','=','users.id')
        ->where('userblockmap.viewOrder','=', 1)
        ->where('userblockmap.blockId', '=', $blockId->blockId)
        ->select('users.id','users.userId','users.fName','users.lName', 'userblockmap.fCount')
        ->first();          

        $blockUsers = \DB::table('userblockmap')
            ->join('users','userblockmap.userId','=','users.id')
            ->where('userblockmap.viewOrder','<>', 1)
            ->where('userblockmap.blockId','=',$blockId->blockId)
            ->orderBy('userblockmap.viewOrder', 'ASC')
            ->select('users.id','users.userId','users.fName','users.lName', 'userblockmap.fCount')
            ->get();

        $emptyUsers = 15 - count($blockUsers);

        return \View::make('dashboard')->with('accounts', $accountsEndAmount[0])
                                       ->with('blockUsers', $blockUsers)
                                       ->with('emptyUsers', $emptyUsers)
                                       ->with('capUser', $capUser);

    }

    public function subractAwardAccount($id, $amount){
        \Log::info('id = '. $id);
        \Log::info('amount = '. $amount);

        $bonusId = DB::table('useraccountmap')
        ->where('useraccountmap.userId','=', $id)
        ->where('useraccountmap.type','=', 1)
        ->select('useraccountmap.accountId')
        ->first();

        $account = AwardAccount::find($bonusId->accountId);
        $account->endAmount = $account->endAmount - $amount;
        $account->save();
    }

    public function subractBonusAccount($id, $amount, $rank){

        $bonusId = DB::table('useraccountmap')
        ->where('useraccountmap.userId','=', $id)
        ->where('useraccountmap.type','=', 2)
        ->where('useraccountmap.groupId','=', $rank)
        ->select('useraccountmap.accountId')
        ->first();

        $account = BonusAccount::find($bonusId->accountId);
        $account->endAmount = $account->endAmount - $amount;
        $account->save();
    }

    public function subractCashAccount($id, $amount){
        \Log::info('id = '. $id);
        \Log::info('amount = '. $amount);

        $bonusId = DB::table('useraccountmap')
        ->where('useraccountmap.userId','=', $id)
        ->where('useraccountmap.type','=', 3)
        ->select('useraccountmap.accountId')
        ->first();

        $account = CashAccount::find($bonusId->accountId);
        $account->endAmount = $account->endAmount - $amount;
        $account->save();
    }

    public function subractUsageAccount($id, $amount){

        $bonusId = DB::table('useraccountmap')
        ->where('useraccountmap.userId','=', $id)
        ->where('useraccountmap.type','=', 4)
        ->select('useraccountmap.accountId')
        ->first();

        $account = UsageAccount::find($bonusId->accountId);
        $account->endAmount = $account->endAmount - $amount;
        $account->save();
    }

    public function subractSavingAccount($id, $amount){

        $bonusId = DB::table('useraccountmap')
        ->where('useraccountmap.userId','=', $id)
        ->where('useraccountmap.type','=', 1)
        ->select('useraccountmap.accountId')
        ->first();

        $account = SavingAccount::find($bonusId->accountId);
        $account->endAmount = $account->endAmount - $amount;
        $account->save();
    }
}
