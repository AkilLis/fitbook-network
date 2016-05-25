<?php
use App\Role;
use App\Permission;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\CashAccount;
use App\AwardAccount;
use App\BonusAccount;
use App\Transactions;
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

Route::get('/', function () {

	if(Auth::check())
	{
   		return redirect('dashboard');
	}
    
    return view('auth.login',[]);
});

/* Notification */
Route::resource('notification', 'NotificationController');
Route::post('auth/login', 'AuthController@login');
Route::get('auth/logout', 'AuthController@logout');
Route::post('auth/password', 'AuthController@password');
//Хэрэглэгч идвэхжүүлэх
Route::put('auth/attachrole/{userId?}', function(Request $request, $id){
    $roleName = $request->roleName;
    $user = User::find($id);

    if(!$user->hasRole($roleName))
    {
        $role = Role::where('name','=', $roleName)->first();
        $user->attachRole($role);
    }
});
Route::put('auth/detachrole/{userId?}', function(Request $request, $id){
    $roleName = $request->roleName;
    $user = User::find($id);

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

Route::get('history', function(){
    return View::make('/blockhistory');
});

Route::resource('admin/users', 'AdminController');
Route::resource('api/cash', 'CashController');

Route::put('get/account/{userId?}',['middleware' => ['auth', 'role:Admin'], function(Request $request, $userId){
    $amount = $request->amount;

    /** Admin үед дансний үлдэгдэл шалгаад хасна */
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

    $trans = array(
                'inUserId' => $currentUser->id,
                'outUserId' => \Auth::user()->id, 
                'invType' => 'CashLoad',
                'invDate' => \Carbon::now(), 
                'invDescription' => '', 
                'inAccountId' => $account->id,
                'outAccountId' => 0, 
                'inAmt' => $amount,
                'outAmt' => 0, 
                'endAmt' => 0,
    );

    Transactions::create($trans);

    return Response::json([
        'status' => 'success'
    ]);
}]);
Route::post('transaction', function(Request $request){
    $userId = $request->id;
    $rank = $request->rank; 
    $awardAmount = $request->awardAmount;
    $bonusAmountBg = $request->bonusAmountBg;
    $bonusAmountAd = $request->bonusAmountAd;
    $tranToken = $request->tranToken;

    if(\Auth::user()->tranToken != $tranToken)
    {
        return Response::json([
                'resultCode' => 2,
            ]);
    }    

    $accountId = DB::table('useraccountmap')
     ->join('users','users.id','=','useraccountmap.userId')
     ->where('users.userId','=', $userId)
     ->where('useraccountmap.type','=', 1)
     ->select('useraccountmap.accountId')
     ->first();

    $account = AwardAccount::find($accountId->accountId);

    $account->endAmount = $account->endAmount + $awardAmount + $bonusAmountBg + $bonusAmountAd;
    $account->save();

    $accountId = DB::table('useraccountmap')
    ->where('useraccountmap.userId','=', \Auth::user()->id)
    ->where('useraccountmap.type','=', 1)
    ->select('useraccountmap.accountId')
    ->first();

    \Log::info('mineAccountId = '.$accountId->accountId);

    $account = AwardAccount::find($accountId->accountId);

    $account->endAmount = $account->endAmount - $awardAmount;

    if($awardAmount != 0)
    {
        $accountId->save();
    }

    if($rank == 1)
    {
        $bonusId = DB::table('useraccountmap')
        ->where('useraccountmap.userId','=', \Auth::user()->id)
        ->where('useraccountmap.type','=', 2)
        ->where('useraccountmap.groupId','=',1)
        ->select('useraccountmap.accountId')
        ->first();

        $bonus = BonusAccount::find($bonusId->accountId);
        $bonus->endAmount = $bonus->endAmount - $bonusAmountBg;
        if($bonusAmountBg != 0)
            $bonus->save();
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
        \Log::info('bonus = '.$bonus->endAmount);
        $bonus->endAmount = $bonus->endAmount - $bonusAmountAd;
        \Log::info('subBonus = '.$bonus->endAmount);
        if($bonusAmountAd != 0)
            $bonus->save();
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
        $bonus->endAmount = $bonus->endAmount - $bonusAmountBg;
        if($bonusAmountBg != 0)
         $bonus->save();

        $bonusId = DB::table('useraccountmap')
        ->where('useraccountmap.userId','=', \Auth::user()->id)
        ->where('useraccountmap.type','=', 2)
        ->where('useraccountmap.groupId','=', 2)
        ->select('useraccountmap.accountId')
        ->first();

        $bonus = BonusAccount::find($bonusId->accountId);
        $bonus->endAmount = $bonus->endAmount - $bonusAmountAd;
        if($bonusAmountAd != 0)
          $bonus->save();
    }

    return Response::json([
            'resultCode' => 0,
        ]);
});

Route::get('account/{type}', function(Request $request, $type){
    switch ($type) 
    {
        case 0:
            break;
        case 1:
            break;
        case 2:
            break;
        case 3:
            break;
        case 4:
            break;
        default:
            return null;
            break;
    }

    $accountInfo = Transactions::all();
    return Response::json($accountInfo);
});

Route::get('get/account', function(){
    $id = \Auth::user()->id;  

    $cash = DB::table('cashaccount')
        ->join('useraccountmap','cashaccount.id','=','useraccountmap.accountId')
        ->where('useraccountmap.userId','=',$id)
        ->first();

    $bonus = DB::table('useraccountmap')
        ->join('bonusaccount','bonusaccount.id','=','useraccountmap.accountId')
        ->where('useraccountmap.userId','=',$id)
        ->orderBy('useraccountmap.groupId', 'ASC')
        ->select('useraccountmap.groupId', 'bonusaccount.endAmount')
        ->get();

    $award = DB::table('useraccountmap')
        ->join('awardaccount','awardaccount.id','=','useraccountmap.accountId')
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
        $filteredUsers = User::where('userId', 'like', "%$searchValue%")
            ->orWhere('fName', 'like', "%$searchValue%")
            ->orWhere('lName', 'like', '%$searchValue%')  
             ->take(5)
            ->get();
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
    $user->detachRole($adminRole);
    return Response::json(null);
});




