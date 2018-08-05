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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('vendors.shared.master');
});

Route::get('/vendorlist', 'Vendor\VendorsController@getHomeData');

Route::get('/delete-product/{id}','Vendor\VendorsController@deleteProduct');

//Route::post('/destroyProduct', 'Vendor\VendorsController@destroy')->name('destroyProduct');


Auth::routes();

Route::get('users/login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);

Route::get('/vendorLogin', 'Auth\LoginController@showVendorLoginForm');

Route::get('/vendorRegister', 'Auth\LoginController@register');

Route::group(array('prefix' => 'vendor', 'namespace' => 'Vendor', 'middleware' => 'vendor'), function () {

    Route::get('/login', 'VendorsController@showLoginForm');

    Route::get('/logout', 'VendorsController@logout');

    Route::get('/product/new', 'VendorsController@createProduct');

    Route::get('/product/{id}', 'VendorsController@editProduct');

});

