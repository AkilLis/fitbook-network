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
            $isRedirect = !$request->isRedirect;
            $cashAmount = $request->cashAmount;
            $awardAmount = $request->awardAmount;
            $bonusAmountBg = $request->bonusAmountBg;
            $bonusAmountAd = $request->bonusAmountAd; 
            $rankId = $request->rank ? 1 : 2;

            if(!User::where('userId','=',$request->id)->first() || User::where('userId','=',$request->id)->first()->isNetwork == 'Y')
                return Response::json(['status' => '_userNotFound']);

            if(!User::where('userId','=',$request->parentId)->first())
                return Response::json(['status' => '_parentNotFound']);

            if($isRedirect && !User::where('userId','=', $request->redirectUser)->first())
                return Response::json(['status' => '_directNotFound']);
            
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

                if($account->endAmount < $bonusAmountAd)
                {
                    return Response::json(['status' => '_amount']);
                }
            }

            $parentId = User::where('userId', '=', $request->parentId)->first()->id;
            $userId = User::where('userId', '=', $request->id)->first()->id;
            $notActivatedUser = $userId;
            $directId = $isRedirect ? User::where('userId', '=', $request->redirectUser)->first()->id : null;

            $currentBlock = DB::table('userblockmap')
                ->join('block', 'userblockmap.blockId', '=', 'block.id')
                ->where('userblockmap.userId','=', $parentId)
                ->where('userblockmap.rankId', '=', $rankId)
                ->where('block.isActive', '=', 'Y')
                ->select('userblockmap.blockId')
                ->first()->blockId;

            $isDevide = 'Y';
            \Log::info('FIRST TIME ==============>');

            while ($isDevide == 'Y') {
                DB::statement('CALL network_calculation(:userId, :blockId, :parentId, :amount, :rankId, :isRedirect, :directId, @isDevide, @outUserId, @outBlockId);',
                    array(
                        $userId,
                        $currentBlock,
                        $parentId,
                        $rankId == 1 ? self::BEGINNER_START : self::ADVANCED_START,
                        $rankId,
                        $isRedirect ? 1 : 0,
                        $directId,
                    )
                );

                $isRedirect = 0;
                $results = DB::select('select @isDevide as isDevide, @outUserId as userId, @outBlockId as blockId');
                $userId = $results[0]->userId;
                $isDevide = $results[0]->isDevide;

                if($isDevide == 'N') break;

                $parentId = DB::table('userblockmap')
                        ->where('userblockmap.userId','=', $results[0]->userId)
                        ->where('userblockmap.rankId','=', $rankId)
                        ->select('userblockmap.parentId')
                        ->first()->parentId;

                $_groupId = DB::table('block')
                ->join('userblockmap', 'userblockmap.blockId', '=', 'block.id')
                ->where('userblockmap.userId','=', $userId)
                ->where('userblockmap.rankId', '=', $rankId)
                ->orderBy('block.groupId', 'DESC')
                ->select('block.groupId')
                ->first()->groupId;

                $parentBlock = User::activeBlocks($parentId)->get()->first();
                if($parentBlock->groupId == $_groupId + 1)
                {
                    \Log::info('PARENT'. $parentBlock->pivot->blockId);
                    $currentBlock = $parentBlock->pivot->blockId;
                }
                else
                {
                    \Log::info('NEARIST');
                    $currentBlock = DB::table('block')
                    ->join('userblockmap', 'userblockmap.blockId', '=', 'block.id')
                    ->where('block.groupId','=', $_groupId + 1)
                    ->where('userblockmap.rankId', '=', $rankId)
                    ->where('block.isActive', '=', 'Y')
                    ->orderBy('block.userCount', 'DESC')
                    ->select('block.id')
                    ->first()->id;
                }       

                \Log::info('user => '. $userId);
                \Log::info('parent => '. $parentId);
                \Log::info('block =>'. $currentBlock);
                \Log::info('devide ==============>'. $isDevide);
                \Log::info('---------------------------------');
            }

            $currentUser = User::where('userId', '=', $request->id)->first();
            $currentUser->isNetwork = 'Y';
            $currentUser->save();

            //ДАНСНААС НЬ МӨНГӨ ХAСAХ
            if($cashAmount != 0)
                $this->subractCashAccount(\Auth::user()->id, $notActivatedUser, $cashAmount);
            if($awardAmount != 0)
                $this->subractAwardAccount(\Auth::user()->id, $notActivatedUser, $awardAmount);
            
            if($bonusAmountBg != 0)
                $this->subractBonusAccount(\Auth::user()->id, $notActivatedUser, $bonusAmountBg, 1);
            if($bonusAmountAd != 0)
                $this->subractBonusAccount(\Auth::user()->id, $notActivatedUser, $bonusAmountAd, 2);
            

        return Response::json(['status' => 'success']);
    }

    public function dashboard(Request $request)
    {
		$id = \Auth::user()->id;
        //Дансны мэдээлэл
    	$accountsEndAmount = \DB::table('users')
            ->join('useraccountmap', 'users.id', '=', 'useraccountmap.userId')
            ->leftJoin('awardaccount', function($join)
              {
                $join->on('useraccountmap.accountId', '=', 'awardaccount.id')
                ->where('useraccountmap.type', '=', 1);
              })
            ->leftJoin('bonusaccount', function($join)
              {
                $join->on('useraccountmap.accountId', '=', 'bonusaccount.id')
                ->where('useraccountmap.type', '=', 2);
              })
            ->leftJoin('cashaccount', function($join)
              {
                $join->on('useraccountmap.accountId', '=', 'cashaccount.id')
                ->where('useraccountmap.type', '=', 3);
              })
            ->leftJoin('savingaccount', function($join)
              {
                $join->on('useraccountmap.accountId', '=', 'savingaccount.id')
                ->where('useraccountmap.type', '=', 4);
              })
            ->leftJoin('usageaccount', function($join)
              {
                $join->on('useraccountmap.accountId', '=', 'usageaccount.id')
                ->where('useraccountmap.type', '=', 5);
              })
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

    public function subractAwardAccount($id, $userId, $amount){

        $bonusId = DB::table('useraccountmap')
        ->where('useraccountmap.userId','=', $id)
        ->where('useraccountmap.type','=', 1)
        ->select('useraccountmap.accountId')
        ->first();

        $account = AwardAccount::find($bonusId->accountId);
        $account->endAmount = $account->endAmount - $amount;
        $account->save();

        $trans = array(
            'inUserId' =>  $userId,
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

    public function subractBonusAccount($id, $userId, $amount, $rank){

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
            'inUserId' => $userId,
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

    public function subractCashAccount($id, $userId, $amount){
        $bonusId = DB::table('useraccountmap')
        ->where('useraccountmap.userId','=', $id)
        ->where('useraccountmap.type','=', 3)
        ->select('useraccountmap.accountId')
        ->first();

        $account = CashAccount::find($bonusId->accountId);
        $account->endAmount = $account->endAmount - $amount;
        $account->save();

        $trans = array(
            'inUserId' => $userId,
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

    public function subractUsageAccount($id, $userId,$amount){

        $bonusId = DB::table('useraccountmap')
        ->where('useraccountmap.userId','=', $id)
        ->where('useraccountmap.type','=', 4)
        ->select('useraccountmap.accountId')
        ->first();

        $account = UsageAccount::find($bonusId->accountId);
        $account->endAmount = $account->endAmount - $amount;
        $account->save();

        $trans = array(
            'inUserId' => $userId,
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

    public function subractSavingAccount($id, $userId, $amount){

        $bonusId = DB::table('useraccountmap')
        ->where('useraccountmap.userId','=', $id)
        ->where('useraccountmap.type','=', 1)
        ->select('useraccountmap.accountId')
        ->first();

        $account = SavingAccount::find($bonusId->accountId);
        $account->endAmount = $account->endAmount - $amount;
        $account->save();

        $trans = array(
            'inUserId' => $userId,
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
