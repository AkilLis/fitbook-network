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
                ['userId' => 'AA00002','fName' => 'Хулангоо', 'lName' => 'Амарсанаа', 'email' => 'hulan@yahoo.com', 'address' => 'asdasd'
                , 'password' => Hash::make('123'), 'phone' => '992032','registryNo' => 'ASD123123', 'accountId' => 'test', 'isNetwork' => 'Y']
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

Route::resource('admin/users', 'AdminController');




