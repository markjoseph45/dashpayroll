<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('user/login');
});

Route::get('/register', function () {
	return view('user/register');
});

Route::get('/payment', function() {
    return view('user/payment');
});

Route::get('/comp_info', 'CompController@store');

Route::resource('/dash', 'DashController');
