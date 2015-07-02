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

Route::get('/', function () {
    return view('home');
});

Route::get('signup', function(){
	return view('signup');
});

Route::get('login', function(){
	return view('login');
});

Route::get('profile', function(){
	return view('profile');
});

Route::get('logout', function(){
	return view('logout');
});

Route::post('processSignUp', function(){
	return view('processSignUp');
});

Route::post('processLogIn', function(){
	return view('processLogIn');
});

Route::get('verifyUsername/{username}',function($username){
	$data['username']=$username;
	return View::make('verifyUsername',$data);
});