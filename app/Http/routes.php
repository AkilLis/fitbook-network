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

Route::group(['prefix' => 'api'], function()
{
	Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
	Route::post('authenticate', 'AuthenticateController@authenticate');
});

Route::post('auth/login', 'AuthController@login');
Route::get('auth/logout', 'AuthController@logout');

// Registration routes...
Route::post('/register', 'Auth\AuthController@register');


//Хэрэглэгчийн хэсэгтэй холбоотой

Route::get('/start', function()
{
    $users = array(
                ['name' => 'Түвшинбат', 'email' => 'g.tuvshinbat@yahoo.com', 'password' => Hash::make('123')]
        );
            
        // Loop through each user above and create the record for them in the database
        foreach ($users as $user)
        {
            User::create($user);
        }

    return 'Woohoo!';
});

Route::get('dashboard', function() {
	return View::make('dashboard');
});

Route::get('admin/users', 'AdminController@allUsers');

Route::post('admin/users', function(Request $request){
	$task = User::create($request->all());
    return Response::json($task);
});

Route::get('admin/users/{user_id?}',function($user_id){
    $user = User::find($user_id);

    return Response::json($task);
});





