<?php

Route::group(['prefix' => ''], function () {
    Route::name('home')->get('/', 'HomeController@index');
    
    Route::group(['namespace' => 'Auth'], function () {
        // Register Route
        Route::name('register')->get('/register', 'RegisterController@register');
        Route::name('register.post')->post('/register', 'RegisterController@postRegister');
        // Login Route
        Route::name('login.post')->post('/login', 'LoginController@postLogin');
        Route::name('logout')->get('/logout', 'LoginController@logout');
    });    
    
    Route::resource('products', 'ProductController')->except([
        'create', 'store', 'update', 'edit', 'destroy'
    ]);

    // Cart Route
    Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
        Route::name('index')->get('/', 'CartController@index');
        Route::name('store')->post('/store', 'CartController@store');
        Route::name('count')->get('/count/{user_id}', 'CartController@count');
        Route::name('checkout')->get('/checkout', 'CartController@checkout');
        Route::name('delete')->get('/delete/{cart}', 'CartController@delete');
    }); 

    // Purchasing Route
    Route::group(['prefix' => 'purchasings', 'as' => 'purchasings.'], function () {
        Route::name('store')->post('/', 'PurchasingController@store');
    }); 

});
