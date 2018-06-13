<?php

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

// Route::get('/', 'WelcomeController@index');

Route::get('/', function(){
	return view('index');
});

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/register',function(){
	return view('register');
});

Route::post('/user/register',array('uses'=>'UserRegistration@postRegister'));


/**
 *  Task App Routes
 */

Route::resource('task','TaskController');

Route::post('posttask','TaskController@store');

Route::get('/delete/{id}','TaskController@destroy');


