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

Route::get('/login/{company_name}', function ($company_name) {
    return view('user/login', compact('company_name'));
});

Route::get('/register', function () {
	return view('user/register');
});

Route::get('/payment', function() {
    return view('user/payment');
});

Route::resource('/comp_info', 'CompanyInfoController');

Route::resource('/signup', 'SignupController');

Route::resource('/login', 'SigninController@login');
