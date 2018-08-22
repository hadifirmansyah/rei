<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['as' => 'admin.'], function () {
    Route::name('places.cities.find')->post('admin/places/cities/find', '\App\Modules\Admin\Http\Controllers\Places\CityController@find');
    Route::name('places.sub_districts.find')->post('admin/places/sub_districts/find', '\App\Modules\Admin\Http\Controllers\Places\SubDistrictController@find');
});
