<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::name('index')->get('/', function () {
        dd('This is the Authentication module index page. Build something great!');
    });
    // Register Route
    Route::name('register')->get('/register', 'RegisterController@register');
    Route::name('register.post')->post('/register', 'RegisterController@postRegister');
    // Login Route
    Route::name('login')->get('/login', 'LoginController@login');
    Route::name('login.post')->post('/login', 'LoginController@postLogin');
    Route::name('logout')->post('/logout', 'LoginController@logout');
});
