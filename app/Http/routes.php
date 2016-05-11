<?php
use App\Role;
use App\Permission;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\CashAccount;
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

Route::post('auth/login', 'AuthController@login');
Route::get('auth/logout', 'AuthController@logout');
//Хэрэглэгч идвэхжүүлэх
Route::post('auth/activate','UserController@activateUser');

//Хэрэглэгчийн хэсэгтэй холбоотой
Route::get('dashboard', 'UserController@dashboard');
Route::resource('admin/users', 'AdminController');

Route::put('get/account/{userId?}', function(Request $request, $userId){
    $amount = $request->amount;

    $accountId = DB::table('useraccountmap')
     ->join('users','users.id','=','useraccountmap.userId')
     ->where('users.userId','=', $userId)
     ->where('type','=', 3)
     ->select('useraccountmap.accountId')
     ->first();

    $account = CashAccount::find($accountId->accountId);

    $account->endAmount = $account->endAmount + $amount;
    $account->save();

});
Route::post('get/account', function(Request $request){
    $id = $request->id;  

    $cash = DB::table('cashaccount')
        ->join('useraccountmap','cashaccount.id','=','useraccountmap.accountId')
        ->where('useraccountmap.userId','=',$id)
        ->first();

    return Response::json([
        'endAmount' => !$cash ? 0 : $cash->endAmount]);

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




