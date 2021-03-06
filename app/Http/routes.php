<?php
use App\AwardAccount;
use App\BonusAccount;
use App\CashAccount;
use App\Events\Chat;
use App\Http\Requests;
use App\Permission;
use App\PromutionUser;
use App\Role;
use App\Transactions;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Нэвтрэх хэсэгтэй холбоотой 
Route::get('/chat', function() 
{
    return view('chat');
});

Route::get('/chat/send', function(Request $request) 
{
    return event(new Chat($request->username, $request->message));
});

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {

    	if(Auth::check())
    	{
            if(Auth::user()->hasRole('Ceo'))
                return redirect('/ceo/dashboard');

            if(Auth::user()->hasRole('Reception'))
                return redirect('/reception');

            if(Auth::user()->hasRole('Promutionmanager'))
                return redirect('/promution');

       		return redirect('dashboard');
    	}
        
        /*return redirect('auth.login');*/

        return view('auth.login',[]);
    });

    Route::get('/promution/create', function () {
        return view('promution.create');
    });

    Route::get('/promution/search', function (Request $request) {

        $searchValue = $request->search;

        $users = PromutionUser::where(function ($query) use ($searchValue) {
            $query->where('fname', 'like', '%'.$searchValue.'%')
                  ->orWhere('registryNo', 'like', '%'.$searchValue.'%')
                  ->orWhere('lname', 'like', '%'.$searchValue.'%');
        })->take(5);

        return Response::json([
            'result' => $users->get(),
        ]);
    });

    Route::delete('/promution/{id}', 'PromutionController@destroy');
    Route::get('/promution/{id}', 'PromutionController@show');

    Route::post('/promution', function(Request $request) {

        $rules = array(
            'fname'       => 'required',
            'lname'      => 'required',
            'registryNo' => 'unique:promution_user|required',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            $request->flash();
            return Redirect::to('promution/create')
                ->with('errors' , $validator->messages()->messages())
                ->withInput();
        }
        
        $parent = PromutionUser::byRegNo(Input::get('parent'));

        $user = new PromutionUser;
        $user->fName = Input::get('fname');
        $user->lName = Input::get('lname');
        $user->registryNo = Input::get('registryNo');
        $user->phone = Input::get('phone');
        $user->parent_id = count($parent) == 0 ? 0 : $parent->id;
        $user->save();

        if(count($parent) != 0) {
            $parent->childCount ++;
            $parent->save();
        }

        Session::flash('message', 'Амжилттай бүртгэлээ.');
        return redirect('/promution');
    });

    

    Route::get('/promution', 'PromutionController@index');
    Route::get('/api/promution', 'PromutionController@list');

    Route::get('/reception', function () {
        $usageTrans = Transactions::where('inUserId', '=', Auth::user()->id)->where('invType','=','usage')
        ->orderBy('invDate', 'DESC')->paginate(20);

        foreach ($usageTrans as $salary) {
            $salary->outUser;
        }
        return view('reception')->with('usageTrans' , $usageTrans);
    })->middleware(['auth', 'ceo:Reception']);

    Route::post('/api/reception-subusage', 'UserController@subUsage')->middleware(['ceo:Reception']);
    Route::get('/api/reception/check/{accountType}', 'UserController@checkReception')->middleware(['ceo:Reception']);

    Route::get('ceo/dashboard', function(){
        return view('ceo.dashboard');
    })->middleware(['auth', 'ceo:Ceo']);
    
    Route::get('api/ceo-activity', 'CeoController@activity')->middleware(['ceo:Ceo']);
    Route::get('api/ceo-profit', 'CeoController@profit')->middleware(['ceo:Ceo']);
    Route::get('api/ceo-profit-detailed', 'CeoController@profitDetailed')->middleware(['ceo:Ceo']);
    Route::get('api/ceo-salary', 'CeoController@salary')->middleware(['ceo:Ceo']);
    Route::get('api/ceo-endSalary', 'CeoController@endSalary')->middleware(['ceo:Ceo']);
    Route::get('api/ceo-usergroup', 'CeoController@userGroupAll')->middleware(['ceo:Ceo']);
    Route::get('api/ceo-userregistration', 'CeoController@userRegistration')->middleware(['ceo:Ceo']);
    Route::get('api/ceo-userregistration-detail', 'CeoController@userRegistrationDetail')->middleware(['ceo:Ceo']);
    Route::get('api/ceo-user/{groupId}', 'CeoController@userGroup')->middleware(['ceo:Ceo']);

    /* Notification */
    Route::resource('notification', 'NotificationController');
    Route::post('auth/login', 'AuthController@login');
    Route::get('auth/logout', 'AuthController@logout');
    Route::post('auth/password', 'AuthController@password');
    //Хэрэглэгч идвэхжүүлэх
    Route::put('auth/attachrole/{userId?}', function(Request $request, $id){
        $roleName = $request->roleName;
        $user = User::findOrFail($id);

        if(!$user->hasRole($roleName))
        {
            $role = Role::where('name','=', $roleName)->first();
            $user->attachRole($role);
        }

        $maxRegId = DB::table('users')->max('regId');
        $maxRegId = $maxRegId + 1;
        $user->regId = $maxRegId < 10 ? '0'.$maxRegId : $maxRegId;
        $user->save(); 
    });
    Route::put('auth/detachrole/{userId?}', function(Request $request, $id){
        $roleName = $request->roleName;
        $user = User::findOrFail($id);

        if($user->hasRole($roleName))
        {
            $role = Role::where('name','=', $roleName)->first();
            $user->detachRole($role);
        }
    });
    Route::post('auth/activate','UserController@activateUser');

    //Хэрэглэгчийн хэсэгтэй холбоотой
    Route::get('dashboard', ['middleware' => 'auth' , 'uses' => 'UserController@dashboard']);
    Route::get('admin/cash', function() {
        return View::make('admin/cash');
    });

    Route::get('history', 'UserController@history');

    Route::group(['middleware' => 'auth'], function()
    {
        Route::resource('admin/users', 'AdminController');
        Route::resource('api/cash', 'CashController');
    });



    Route::put('get/account/{userId?}', function(Request $request, $userId){
        

        $amount = $request->amount;

        DB::beginTransaction();
        try {
            /** Admin үед дансний үлдэгдэл шалгаад хасна */
            if(!\Auth::user())
                return;

            if(\Auth::user()->hasRole('Admin'))
            {
                
                $adminAccount = DB::table('useraccountmap')
                    ->where('useraccountmap.userId','=', \Auth::user()->id)
                    ->where('useraccountmap.type','=', 3)
                    ->select('useraccountmap.accountId')
                    ->first();

                $adminCash = CashAccount::find($adminAccount->accountId);
                if($adminCash->endAmount < $amount)
                {
                    return Response::json([
                        'status' => '_cashNotEnought',
                    ]);
                }

                $adminCash->endAmount = $adminCash->endAmount - $amount;
                $adminCash->save();
            }

            $accountId = DB::table('useraccountmap')
             ->join('users','useraccountmap.userId','=','users.id')
             ->where('users.userId','=', $userId)
             ->where('useraccountmap.type','=', 3)
             ->select('useraccountmap.accountId')
             ->first();

            $account = CashAccount::find($accountId->accountId);
            $account->endAmount = $account->endAmount + $amount;
            $account->save();

            $currentUser = User::where('userId','=',$userId)->first();

            //Админы гүйлгээ
            $trans = array(
                        'inUserId' => \Auth::user()->id,
                        'outUserId' => $currentUser->id, 
                        'invType' => 'CashLoad',
                        'invDate' => \Carbon::now(), 
                        'invDescription' => '', 
                        'inAccountId' => $account->id,
                        'outAccountId' => 0, 
                        'inAmt' => 0,
                        'outAmt' => $amount, 
                        'endAmt' => 0,
            );

            Transactions::create($trans);

            //Хэрэглэгчийн

            $trans = array(
                        'inUserId' => \Auth::user()->id,
                        'outUserId' => $currentUser->id, 
                        'invType' => 'Cash',
                        'invDate' => \Carbon::now(), 
                        'invDescription' => '', 
                        'inAccountId' => $account->id,
                        'outAccountId' => 0, 
                        'inAmt' => $amount,
                        'outAmt' => 0, 
                        'endAmt' => $account->endAmount,
            );

            Transactions::create($trans);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

        return Response::json([
            'status' => 'success'
        ]);
    });
    /* 
        GET USER ALL TRANSACTIONS
    */
    Route::post('transaction', function(Request $request){
        $userId = $request->id;
        $deliveryUser = User::where('userId','=', $request->id)->first();
        $rank = $request->rank; 
        $awardAmount = $request->awardAmount;
        $bonusAmountBg = $request->bonusAmountBg;
        $bonusAmountAd = $request->bonusAmountAd;
        $tranToken = $request->tranToken;
        $description = $request->description;

        \Log::info('test'. $description);

        if(\Auth::user()->tranToken != $tranToken)
        {
            return Response::json([
                    'resultCode' => 2,
                ]);
        }    

        $deliveryAccountId = DB::table('useraccountmap')
         ->join('users','users.id','=','useraccountmap.userId')
         ->where('users.userId','=', $userId)
         ->where('useraccountmap.type','=', 1)
         ->select('useraccountmap.accountId')
         ->first();

        $deliveryAccount = AwardAccount::find($deliveryAccountId->accountId);

        $accountId = DB::table('useraccountmap')
        ->where('useraccountmap.userId','=', \Auth::user()->id)
        ->where('useraccountmap.type','=', 1)
        ->select('useraccountmap.accountId')
        ->first();

        $account = AwardAccount::find($accountId->accountId);

        if($account->endAmount < $awardAmount)
        {
           return Response::json([
                    'resultCode' => 3,
                ]); 
        }

        DB::beginTransaction();

        try {

            if($rank == 1)
            {
                $bonusId = DB::table('useraccountmap')
                ->where('useraccountmap.userId','=', \Auth::user()->id)
                ->where('useraccountmap.type','=', 2)
                ->where('useraccountmap.groupId','=',1)
                ->select('useraccountmap.accountId')
                ->first();

                $bonus = BonusAccount::find($bonusId->accountId);
                if($bonusAmountBg != 0)
                {
                    if($bonus->endAmount < $bonusAmountBg)
                    {
                        return Response::json([
                            'resultCode' => 3,
                        ]); 
                    }
                    $bonus->endAmount = $bonus->endAmount - $bonusAmountBg;
                    $bonus->save();

                    $trans = array(
                        'inUserId' => $deliveryUser->id,
                        'outUserId' => \Auth::user()->id, 
                        'invType' => 'Bonus',
                        'invDate' => \Carbon::now(), 
                        'invDescription' => $description, 
                        'inAccountId' => $bonus->id,
                        'outAccountId' => $deliveryAccount->id, 
                        'inAmt' => 0,
                        'outAmt' => $bonusAmountBg, 
                        'endAmt' => $bonus->endAmount,
                    );

                    Transactions::create($trans);
                }
            }

            if($rank == 2)
            {
                $bonusId = DB::table('useraccountmap')
                ->where('useraccountmap.userId','=', \Auth::user()->id)
                ->where('useraccountmap.type','=', 2)
                ->where('useraccountmap.groupId','=', 2)
                ->select('useraccountmap.accountId')
                ->first();

                $bonus = BonusAccount::find($bonusId->accountId);
                if($bonusAmountAd != 0)
                {
                    if($bonus->endAmount < $bonusAmountAd)
                    {
                        return Response::json([
                            'resultCode' => 3,
                        ]); 
                    }
                    $bonus->endAmount = $bonus->endAmount - $bonusAmountAd;
                    $bonus->save();

                    $trans = array(
                        'inUserId' => $deliveryUser->id,
                        'outUserId' => \Auth::user()->id, 
                        'invType' => 'Bonus',
                        'invDate' => \Carbon::now(), 
                        'invDescription' => $description, 
                        'inAccountId' => $bonus->id,
                        'outAccountId' => $deliveryAccount->id, 
                        'inAmt' => 0,
                        'outAmt' => $bonusAmountAd, 
                        'endAmt' => $bonus->endAmount,
                    );

                    Transactions::create($trans);
                }
            }

            if($rank == 3)
            {
                $bonusId = DB::table('useraccountmap')
                ->where('useraccountmap.userId','=', \Auth::user()->id)
                ->where('useraccountmap.type','=', 2)
                ->where('useraccountmap.groupId','=',1)
                ->select('useraccountmap.accountId')
                ->first();

                $bonus = BonusAccount::find($bonusId->accountId);
                if($bonusAmountBg != 0)
                {
                    if($bonus->endAmount < $bonusAmountBg)
                    {
                       return Response::json([
                                'resultCode' => 3,
                            ]); 
                    }

                    $bonus->endAmount = $bonus->endAmount - $bonusAmountBg;
                    $bonus->save();

                    $trans = array(
                        'inUserId' => $deliveryUser->id,
                        'outUserId' => \Auth::user()->id, 
                        'invType' => 'Bonus',
                        'invDate' => \Carbon::now(), 
                        'invDescription' => $description, 
                        'inAccountId' => $bonus->id,
                        'outAccountId' => $deliveryAccount->id, 
                        'inAmt' => 0,
                        'outAmt' => $bonusAmountBg, 
                        'endAmt' => $bonus->endAmount,
                    );

                    Transactions::create($trans);
                }

                $bonusId = DB::table('useraccountmap')
                ->where('useraccountmap.userId','=', \Auth::user()->id)
                ->where('useraccountmap.type','=', 2)
                ->where('useraccountmap.groupId','=', 2)
                ->select('useraccountmap.accountId')
                ->first();

                $bonus = BonusAccount::find($bonusId->accountId);
                if($bonusAmountAd != 0)
                {
                    if($bonus->endAmount < $bonusAmountAd)
                    {
                       return Response::json([
                                'resultCode' => 3,
                            ]); 
                    }

                    $bonus->endAmount = $bonus->endAmount - $bonusAmountAd;
                    $bonus->save();

                    $trans = array(
                        'inUserId' => $deliveryUser->id,
                        'outUserId' => \Auth::user()->id, 
                        'invType' => 'Bonus',
                        'invDate' => \Carbon::now(), 
                        'invDescription' => $description, 
                        'inAccountId' => $bonus->id,
                        'outAccountId' => $deliveryAccount->id, 
                        'inAmt' => 0,
                        'outAmt' => $bonusAmountAd, 
                        'endAmt' => $bonus->endAmount,
                    );

                    Transactions::create($trans);
                }
            }

            $account->endAmount = $account->endAmount - $awardAmount;

            if($awardAmount != 0)
            {
                $account->save();
                $trans = array(
                        'inUserId' => $deliveryUser->id,
                        'outUserId' => \Auth::user()->id, 
                        'invType' => 'Award',
                        'invDate' => \Carbon::now(), 
                        'invDescription' => $description, 
                        'inAccountId' => $account->id,
                        'outAccountId' => $deliveryAccount->id, 
                        'inAmt' => 0,
                        'outAmt' => $awardAmount, 
                        'endAmt' => $account->endAmount,
                );

                Transactions::create($trans);
            }

            
            $deliveryAccount->endAmount = $deliveryAccount->endAmount + $awardAmount + $bonusAmountBg + $bonusAmountAd;
            $deliveryAccount->save();

            $trans = array(
                        'inUserId' => \Auth::user()->id,
                        'outUserId' => $deliveryUser->id, 
                        'invType' => 'Award',
                        'invDate' => \Carbon::now(), 
                        'invDescription' => $description, 
                        'inAccountId' => $deliveryAccount->id,
                        'outAccountId' => 0, 
                        'inAmt' => $awardAmount + $bonusAmountBg + $bonusAmountAd,
                        'outAmt' => 0, 
                        'endAmt' => $deliveryAccount->endAmount,
            );

            Transactions::create($trans);

            DB::commit();
        
        } 
        
        catch (\Exception $e) 
        {
            DB::rollback();
        }

        return Response::json([
                'resultCode' => 0,
        ]);
    });

    Route::put('api/salary/{userId}', function(Request $request, $userId){

        $deliveryUser = User::where('userId','=', $userId)->first();
        
        $rank = $request->rank; 
        $awardAmount = $request->awardAmount;
        $bonusAmountBg = $request->bonusAmountBg;
        $bonusAmountAd = $request->bonusAmountAd;
        
        switch ($rank) {
            case 1:
                if($bonusAmountBg != 0)
                {
                    $bonusBg = DB::table('useraccountmap')
                        ->where('useraccountmap.userId','=', $deliveryUser->id)
                        ->where('useraccountmap.type','=', 2)
                        ->where('useraccountmap.groupId','=',1)
                        ->select('useraccountmap.accountId')
                        ->first();

                    $bonus = BonusAccount::find($bonusBg->accountId);
                    
                    if($bonus->endAmount < $bonusAmountBg)
                    {
                        return Response::json([
                            'resultCode' => 3,
                        ]); 
                    }
                    $bonus->endAmount = $bonus->endAmount - $bonusAmountBg;
                    $bonus->save();

                    $trans = array(
                        'inUserId' => \Auth::user()->id,
                        'outUserId' => $deliveryUser->id, 
                        'invType' => 'Bonus',
                        'invDate' => \Carbon::now(), 
                        'invDescription' => 'Flexgym-Цалин', 
                        'inAccountId' => $bonus->id,
                        'outAccountId' => 0, 
                        'inAmt' => 0,
                        'outAmt' => $bonusAmountBg, 
                        'endAmt' => $bonus->endAmount,
                    );

                    Transactions::create($trans);
                }
                break;
            case 2:
                if($bonusAmountAd != 0)
                {
                    $bonusId = DB::table('useraccountmap')
                    ->where('useraccountmap.userId','=', $deliveryUser->id)
                    ->where('useraccountmap.type','=', 2)
                    ->where('useraccountmap.groupId','=', 2)
                    ->select('useraccountmap.accountId')
                    ->first();

                    $bonus = BonusAccount::find($bonusId->accountId);
                    if($bonus->endAmount < $bonusAmountAd)
                    {
                        return Response::json([
                            'resultCode' => 3,
                        ]); 
                    }
                    $bonus->endAmount = $bonus->endAmount - $bonusAmountAd;
                    $bonus->save();

                    $trans = array(
                        'inUserId' => \Auth::user()->id,
                        'outUserId' => $deliveryUser->id, 
                        'invType' => 'Bonus',
                        'invDate' => \Carbon::now(), 
                        'invDescription' => 'Flexgym-Цалин', 
                        'inAccountId' => $bonus->id,
                        'outAccountId' => 0, 
                        'inAmt' => 0,
                        'outAmt' => $bonusAmountAd, 
                        'endAmt' => $bonus->endAmount,
                    );

                    Transactions::create($trans);
                }
                break;
            case 3:
                $bonusId = DB::table('useraccountmap')
                    ->where('useraccountmap.userId','=', $deliveryUser->id)
                    ->where('useraccountmap.type','=', 2)
                    ->where('useraccountmap.groupId','=',1)
                    ->select('useraccountmap.accountId')
                    ->first();

                $bonus = BonusAccount::find($bonusId->accountId);
                if($bonusAmountBg != 0)
                {
                    if($bonus->endAmount < $bonusAmountBg)
                    {
                       return Response::json([
                                'resultCode' => 3,
                            ]); 
                    }

                    $bonus->endAmount = $bonus->endAmount - $bonusAmountBg;
                    $bonus->save();

                    $trans = array(
                        'inUserId' => \Auth::user()->id,
                        'outUserId' => $deliveryUser->id, 
                        'invType' => 'Bonus',
                        'invDate' => \Carbon::now(), 
                        'invDescription' => 'Flexgym-Цалин',  
                        'inAccountId' => $bonus->id,
                        'outAccountId' => 0, 
                        'inAmt' => 0,
                        'outAmt' => $bonusAmountBg, 
                        'endAmt' => $bonus->endAmount,
                    );

                    Transactions::create($trans);
                }

                $bonusId = DB::table('useraccountmap')
                ->where('useraccountmap.userId','=', $deliveryUser->id)
                ->where('useraccountmap.type','=', 2)
                ->where('useraccountmap.groupId','=', 2)
                ->select('useraccountmap.accountId')
                ->first();

                $bonus = BonusAccount::find($bonusId->accountId);
                if($bonusAmountAd != 0)
                {
                    if($bonus->endAmount < $bonusAmountAd)
                    {
                       return Response::json([
                                'resultCode' => 3,
                            ]); 
                    }

                    $bonus->endAmount = $bonus->endAmount - $bonusAmountAd;
                    $bonus->save();

                    $trans = array(
                        'inUserId' => \Auth::user()->id,
                        'outUserId' => $deliveryUser->id, 
                        'invType' => 'Bonus',
                        'invDate' => \Carbon::now(), 
                        'invDescription' => 'Flexgym-Цалин', 
                        'inAccountId' => $bonus->id,
                        'outAccountId' => 0, 
                        'inAmt' => 0,
                        'outAmt' => $bonusAmountAd, 
                        'endAmt' => $bonus->endAmount,
                    );

                    Transactions::create($trans);
                }
                break;
            default:
                break;
        }

        $accountId = DB::table('useraccountmap')
        ->where('useraccountmap.userId','=', $deliveryUser->id)
        ->where('useraccountmap.type','=', 1)
        ->select('useraccountmap.accountId')
        ->first();

        $account = AwardAccount::find($accountId->accountId);
        $account->endAmount = $account->endAmount - $awardAmount;

        if($awardAmount != 0)
        {
            $account->save();
            $trans = array(
                    'inUserId' => \Auth::user()->id,
                    'outUserId' => $deliveryUser->id, 
                    'invType' => 'Award',
                    'invDate' => \Carbon::now(), 
                    'invDescription' => 'Flexgym-Цалин',  
                    'inAccountId' => $account->id,
                    'outAccountId' => 0, 
                    'inAmt' => 0,
                    'outAmt' => $awardAmount, 
                    'endAmt' => $account->endAmount,
            );

            Transactions::create($trans);
        }

        return Response::json([
                'resultCode' => 0,
            ]);

    });

    Route::put('api/account/{userId}', function(Request $request, $userId){
        \Log::info('test = orj bna');
        $id = User::where('userId','=', $userId)->first()->id;  

        $cash = DB::table('cashaccount')
            ->join('useraccountmap', function($join)
              {
                $join->on('useraccountmap.accountId', '=', 'cashaccount.id')
                     ->where('useraccountmap.type', '=', 3);
              })
            ->where('useraccountmap.userId','=',$id)
            ->first();

        $bonus = DB::table('useraccountmap')
            ->join('bonusaccount', function($join)
              {
                $join->on('useraccountmap.accountId', '=', 'bonusaccount.id')
                     ->where('useraccountmap.type', '=', 2);
              })
            ->where('useraccountmap.userId','=',$id)
            ->orderBy('useraccountmap.groupId', 'ASC')
            ->select('useraccountmap.groupId', 'bonusaccount.endAmount')
            ->get();

        $award = DB::table('useraccountmap')
            ->join('awardaccount', function($join)
              {
                $join->on('useraccountmap.accountId', '=', 'awardaccount.id')
                     ->where('useraccountmap.type', '=', 1);
              })
            ->where('useraccountmap.userId','=',$id)
            ->orderBy('useraccountmap.groupId', 'ASC')
            ->select('useraccountmap.groupId', 'awardaccount.endAmount')
            ->get();
        // rankId = 1 Beginnner;
        // rankId = 2 Advanced
        // rankId = 3 Both;
        $rankId = 1;
        if(true)
        {
            //$rankId = $bonus[0]->groupId;
            return Response::json([
                    'rankId' => $rankId, 
                    'cashEndAmount' => !$cash ? 0 : $cash->endAmount,
                    'bonusEndAmount' => $bonus[0]->endAmount,
                    'awardEndAmount' => $award[0]->endAmount]
            );
        }
        else
        {
            //$rankId = 1;
            return Response::json([
            'rankId' => $rankId, 
            'cashEndAmount' => !$cash ? 0 : $cash->endAmount,
            'bonusEndAmountBg' => $bonus[0]->endAmount,
            'bonusEndAmountAd' => $bonus[1]->endAmount,
            'awardEndAmount' => $award[0]->endAmount]);
        }
    });

    Route::get('get/account', function(){
        $id = \Auth::user()->id;  

        $cash = DB::table('cashaccount')
            ->join('useraccountmap', function($join)
              {
                $join->on('useraccountmap.accountId', '=', 'cashaccount.id')
                ->where('useraccountmap.type', '=', 3);
              })
            ->where('useraccountmap.userId','=',$id)
            ->first();

        $bonus = DB::table('useraccountmap')
            ->join('bonusaccount', function($join)
              {
                $join->on('useraccountmap.accountId', '=', 'bonusaccount.id')
                ->where('useraccountmap.type', '=', 2);
              })
            ->where('useraccountmap.userId','=',$id)
            ->orderBy('useraccountmap.groupId', 'ASC')
            ->select('useraccountmap.groupId', 'bonusaccount.endAmount')
            ->get();

        $award = DB::table('useraccountmap')
            ->join('awardaccount', function($join)
              {
                $join->on('useraccountmap.accountId', '=', 'awardaccount.id')
                ->where('useraccountmap.type', '=', 1);
              })
            ->where('useraccountmap.userId','=',$id)
            ->orderBy('useraccountmap.groupId', 'ASC')
            ->select('useraccountmap.groupId', 'awardaccount.endAmount')
            ->get();
        // rankId = 1 Beginnner;
        // rankId = 2 Advanced
        // rankId = 3 Both;
        $rankId = 1;
        if(count($bonus) == 1)
        {
            $rankId = $bonus[0]->groupId;
            return Response::json([
                    'rankId' => $rankId, 
                    'cashEndAmount' => !$cash ? 0 : $cash->endAmount,
                    'bonusEndAmount' => $bonus[0]->endAmount,
                    'awardEndAmount' => $award[0]->endAmount]
            );
        }
        else
        {
            $rankId = 3;
            return Response::json([
            'rankId' => $rankId, 
            'cashEndAmount' => !$cash ? 0 : $cash->endAmount,
            'bonusEndAmountBg' => $bonus[0]->endAmount,
            'bonusEndAmountAd' => $bonus[1]->endAmount,
            'awardEndAmount' => $award[0]->endAmount]);
        }
    });

    Route::post('get/account', function(Request $request)
    {
        $id = $request->id;  

        $cash = DB::table('cashaccount')
            ->join('useraccountmap','cashaccount.id','=','useraccountmap.accountId')
            ->where('useraccountmap.userId','=',$id)
            ->first();

        return Response::json([
            'cashEndAmount' => !$cash ? 0 : $cash->endAmount, ]
        );
    });

    Route::post('get/users',function(Request $request){
        $searchValue = $request->search;
        try
        {
            $filteredUsers = User::where('isNetwork','=', $request->isNotActivated ? 'N' : 'Y');
            $filteredUsers = $filteredUsers->where(function ($query) use ($searchValue) {
                $query->where('userId', 'like', '%'.$searchValue.'%')
                      ->orWhere('fName', 'like', '%'.$searchValue.'%')
                      ->orWhere('lName', 'like', '%'.$searchValue.'%');
            })->take(5);
            
            $filteredUsers = $filteredUsers->get();            
        }
        catch(ModelNotFoundException $ex)
        {
            return Response::json([
            'gotinfo' => 'failed',
            ]); 
        }

        return Response::json([
            'gotinfo' => 'success',
            'users' => $filteredUsers,
        ]);
    });

    //CEO хэсэг
    Route::get('ceo/admins',function() {
        $adminUsers = DB::table('users')
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->where('role_user.role_id', '=', '1')
                ->select('users.id', 'users.userId', 'users.fName', 'users.lName')
                ->get();
        return Response::json($adminUsers);
    });

    Route::post('/ceo/admins',function(Request $request){
        $user = User::where('userId', '=', $request->userId)->first();
        $adminRole = Role::find('1');

        if(!$user->hasRole('Admin')) {
            $user->attachRole($adminRole);
        }

        $resp = ['id' => $user->id, 'userId' => $user->userId, 'fName' => $user->fName, 'lName' => $user->lName];

        return Response::json($resp);
    });

    Route::delete('ceo/admins/{id?}',function($id){
        $user = User::find($id);
        $adminRole = Role::find('1');
        $user->roles()->dettach(1);
        return Response::json(null);
    });

    Route::get('/myteam/{id?}', 'UserController@myTeam');
}); 




