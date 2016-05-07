<?php
use App\Role;
use App\Permission;
use App\User;
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
   		return View::make('dashboard');
	}
    
    return view('auth.login',[]);
});

Route::post('auth/login', 'AuthController@login');
Route::get('auth/logout', 'AuthController@logout');

//Хэрэглэгчийн хэсэгтэй холбоотой
Route::get('dashboard', 'UserController@dashboard');
Route::resource('admin/users', 'AdminController');

//CEO хэсэг
Route::get('ceo/admins',function() {
    $adminUsers = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->where('role_user.role_id', '=', '1')
            ->select('users.id', 'users.userId', 'users.fName', 'users.lName')
            ->get();
    return Response::json($adminUsers);
});


Route::delete('ceo/admins{user_id?}',function($user_id){
    $user = Task::find($user_id);
    $user->roles()->detach();
    return Response::json($user);
});




