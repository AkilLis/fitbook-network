<?php

namespace App\Http\Controllers;

use App\AwardAccount;
use App\BonusAccount;
use App\CashAccount;
use App\Http\Requests;
use App\SavingAccount;
use App\Transactions;
use App\UsageAccount;
use App\User;
use DB;
use Illuminate\Http\Request;
use Response;

class UserController extends Controller
{
    const BEGINNER_START = 300000;
    const ADVANCED_START = 600000;

    public function history(Request $request)
    {
        $blocks = User::deactiveBlocks(\Auth::user()->id)->get()->all();

        foreach ($blocks as $block) {
            $block->setMembers();
        }

        return \View::make('blockhistory')->with('blocks', $blocks);
    }

    public static function isActivator()
    {
        $instance = new static;
        return true;
    }

    //ХЭРЭГЛЭГЧ ИДЭВХЖҮҮЛЭХ
    public function activateUser(Request $request)
    {   

            $cashAmount = $request->cashAmount;
            $awardAmount = $request->awardAmount;
            $bonusAmountBg = $request->bonusAmountBg;
            $bonusAmountAd = $request->bonusAmountAd; 
            $rankId = $request->rank ? 1 : 2;

            if(!User::where('userId','=',$request->id)->first() || User::where('userId','=',$request->id)->first()->isNetwork == 'Y')
                return Response::json(['status' => '_userNotFound']);

            if(!User::where('userId','=',$request->parentId)->first())
                return Response::json(['status' => '_parentNotFound']);
            
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
                ->where('block.isActive', '=', 'Y')
                ->select('userblockmap.blockId')
                ->first()->blockId;

            $isDevide = 'Y';

            while ($isDevide == 'Y') {

                \Log::info('STARTED----------------->'. $rankId);
                \Log::info('userId = '. $userId);
                \Log::info('currentBlock = '. $currentBlock);
                \Log::info('parentId = '. $parentId);
                \Log::info('rankId = '. $rankId);
                \Log::info('------------------------>');
                DB::statement('CALL network_calculation(:userId, :blockId, :parentId, :amount, :rankId, @isDevide, @outUserId, @outBlockId);',
                    array(
                        $userId,
                        $currentBlock,
                        $parentId,
                        $rankId == 1 ? self::BEGINNER_START : self::ADVANCED_START,
                        $rankId
                    )
                );
                \Log::info('MIDDLE');

                $results = DB::select('select @isDevide as isDevide, @outUserId as userId, @outBlockId as blockId');

                \Log::info('tested = '.$results[0]->isDevide);

                $userId = $results[0]->userId;
                $isDevide = $results[0]->isDevide;


                if($isDevide == 'N') break;

                $currentBlock = $results[0]->blockId;
                $parentId = DB::table('userblockmap')
                        ->where('userblockmap.userId','=', $results[0]->userId)
                        ->select('userblockmap.parentId')
                        ->first()->parentId;
            }

            $currentUser = User::where('userId', '=', $request->id)->first();
            $currentUser->isNetwork = 'Y';
            $currentUser->save();

            //ДАНСНААС НЬ МӨНГӨ ХAСAХ
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
            ->join('useraccountmap', 'users.id', '=', 'useraccountmap.userId')
            ->leftJoin('awardaccount', 'useraccountmap.accountId', '=', 'awardaccount.id')
            ->leftJoin('bonusaccount', 'useraccountmap.accountId', '=', 'bonusaccount.id')
            ->leftJoin('cashaccount', 'useraccountmap.accountId', '=', 'cashaccount.id')
            ->leftJoin('usageaccount', 'useraccountmap.accountId', '=', 'usageaccount.id')
            ->leftJoin('savingaccount', 'useraccountmap.accountId', '=', 'savingaccount.id')
            ->select(\DB::raw('round(sum(awardaccount.endAmount), 0) as awardEnd, round(sum(bonusaccount.endAmount), 0) as bonusEnd, round(sum(cashaccount.endAmount), 0) as cashEnd, round(sum(usageaccount.endAmount), 0) as usageEnd,
            	round(sum(savingaccount.endAmount), 0) as savingEnd'))
            ->where('users.id', '=', $id)
            ->groupBy('users.id')
            ->get();

        //Яг одоо идвэхтэй блок, ахисан шат сүүлд шалгана     
        $block = User::activeBlocks($id)->get()->first();
        $block->setMembers();

        $emptyUsers = 16 - count($block->members);
        $groupName = "1-р шат - Хамтрах шат";

        switch ($block->groupId) {
            case 1:
                break;
            case 2:
                $groupName = "2-р шат - Өсөх шат";
                break;
            case 3:
                $groupName = "3-р шат - Баяжих шат";
                break;
            case 4:
                $groupName = "4-р шат - Лидер";
                break;
            default:
                break;
        }
        return \View::make('dashboard')->with('accounts', $accountsEndAmount[0])
                                       ->with('emptyUsers', $emptyUsers)
                                       ->with('block', $block)
                                       ->with('groupName', $groupName);
    }

    public function subractAwardAccount($id, $amount){

        $bonusId = DB::table('useraccountmap')
        ->where('useraccountmap.userId','=', $id)
        ->where('useraccountmap.type','=', 1)
        ->select('useraccountmap.accountId')
        ->first();

        $account = AwardAccount::find($bonusId->accountId);
        $account->endAmount = $account->endAmount - $amount;
        $account->save();

        $trans = array(
            'inUserId' => 0,
            'outUserId' => $id, 
            'invType' => 'Award',
            'invDate' => \Carbon::now(), 
            'invDescription' => 'Хэрэглэгч идэвхжүүлэх', 
            'inAccountId' => 0,
            'outAccountId' => $account->id, 
            'inAmt' => 0,
            'outAmt' => $amount, 
            'endAmt' => $account->endAmount,
        );

        Transactions::create($trans);
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

        $trans = array(
            'inUserId' => 0,
            'outUserId' => $id, 
            'invType' => 'Bonus',
            'invDate' => \Carbon::now(), 
            'invDescription' => 'Хэрэглэгч идэвхжүүлэх', 
            'inAccountId' => 0,
            'outAccountId' => $account->id, 
            'inAmt' => 0,
            'outAmt' => $amount, 
            'endAmt' => $account->endAmount,
        );

        Transactions::create($trans);
    }

    public function subractCashAccount($id, $amount){
        $bonusId = DB::table('useraccountmap')
        ->where('useraccountmap.userId','=', $id)
        ->where('useraccountmap.type','=', 3)
        ->select('useraccountmap.accountId')
        ->first();

        $account = CashAccount::find($bonusId->accountId);
        $account->endAmount = $account->endAmount - $amount;
        $account->save();

        $trans = array(
            'inUserId' => 0,
            'outUserId' => $id, 
            'invType' => 'Cash',
            'invDate' => \Carbon::now(), 
            'invDescription' => 'Хэрэглэгч идэвхжүүлэх', 
            'inAccountId' => 0,
            'outAccountId' => $account->id, 
            'inAmt' => 0,
            'outAmt' => $amount, 
            'endAmt' => $account->endAmount,
        );

        Transactions::create($trans);
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

        $trans = array(
            'inUserId' => 0,
            'outUserId' => $id, 
            'invType' => 'Usage',
            'invDate' => \Carbon::now(), 
            'invDescription' => 'Хэрэглэгч идэвхжүүлэх', 
            'inAccountId' => 0,
            'outAccountId' => $account->id, 
            'inAmt' => 0,
            'outAmt' => $amount, 
            'endAmt' => $account->endAmount,
        );

        Transactions::create($trans);
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

        $trans = array(
            'inUserId' => 0,
            'outUserId' => $id, 
            'invType' => 'Saving',
            'invDate' => \Carbon::now(), 
            'invDescription' => 'Хэрэглэгч идэвхжүүлэх', 
            'inAccountId' => 0,
            'outAccountId' => $account->id, 
            'inAmt' => 0,
            'outAmt' => $amount, 
            'endAmt' => $account->endAmount,
        );

        Transactions::create($trans);
    }

    public function myTeam(Request $request, $id)
    {
        if($id == 0)
        $id = \Auth::user()->id;
        $rank = 1;

        $childs = DB::table('userblockmap')
        ->join('users','userblockmap.userId','=','users.id')
        ->join('block','userblockmap.blockId','=','block.id')
        ->where('userblockmap.parentId','=', $id)
        ->where('block.groupId','=', $rank)
        ->groupBy('users.id','users.fName','users.lName', 'users.userId')
        ->select('users.id','users.fName','users.lName', 'users.userId')
        ->get();
        
        $user = User::find($id);

        $parent = DB::table('userblockmap')
        ->join('users','userblockmap.userId','=','users.id')
        ->join('block','userblockmap.blockId','=','block.id')
        ->where('userblockmap.userId','=', $id)
        ->where('block.groupId','=', $rank)
        ->select('userblockmap.parentId')->first();

        if($parent->parentId == 0)
        {
            $parent = array('id' => 0,
                            'fName' => 'Flexgym',
                            'lName' => 'Flexgym',
                            'userId' => '0');
        }
        else
            $parent = User::find($parent->parentId);

        //BreadCrumb list
        $breadCrumb = $this->findMyTeam($id, \Auth::user()->id, $rank);
        return Response::json(['user' => $user,
                              'childs' => $childs,
                              'parent' => $parent,
                              'breadcrumb' => $breadCrumb]);
    }

    public function findMyTeam($id, $parentId, $rank)
    {
        $response = [];    
        $tempId = $id;
        
        while($tempId != $parentId)
        {
            $pId = DB::table('userblockmap')
                ->join('users','userblockmap.userId','=','users.id')
                ->join('block', 'userblockmap.blockId','=', 'block.id')
                ->where('userblockmap.userId','=', $tempId)
                ->where('block.groupId','=', $rank)
                ->select('userblockmap.parentId')->first();

            $tempId = $pId->parentId;    
            $parent = DB::table('users')
                ->where('users.id','=', $tempId)
                ->select('users.id','users.fName')
                ->first();
            array_push($response, $parent);
        }
         
        $response = array_reverse($response);    
        $selfUser = array('id' => $id, 
                           'fName' => User::find($id)->fName,
                           'parentId' => 0,
                           'class' => 'active');
        array_push($response, $selfUser);
        return $response;
    }
}
