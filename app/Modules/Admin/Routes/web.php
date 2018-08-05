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

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'sentinel_auth'], function () {
    Route::name('dashboard')->get('/', 'HomeController@index');

    // Route for products
    Route::resource('products', 'ProductController');
    
    // Route for categories
    Route::resource('categories', 'CategoryController')->except(['show', 'destroy']);
    Route::name('categories.destroy')->get('/categories/{category}', 'CategoryController@destroy');
    
    // Route for user
    Route::resource('users', 'UserController');
    Route::name('users.destroy')->get('/users/{user}', 'UserController@destroy');
    
    Route::group(['prefix' => 'places', 'as' => 'places.', 'namespace' => 'Places'], function () {
        // Route for province
        Route::resource('provinces', 'ProvinceController');
        Route::name('provinces.destroy')->get('/provinces/{province}', 'ProvinceController@destroy');
        // Route for city
        Route::resource('cities', 'CityController');
        Route::name('cities.destroy')->get('/cities/{city}', 'CityController@destroy');
        Route::name('cities.find')->post('/cities/find', 'CityController@find');
        // Route for sub districts
        Route::resource('sub_districts', 'SubDistrictController');
        Route::name('sub_districts.destroy')->get('/sub_districts/{sub_district}', 'SubDistrictController@destroy');
        Route::name('sub_districts.find')->post('/sub_districts/find', 'SubDistrictController@find');
    });    
    
});
