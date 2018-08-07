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

Route::get('/product', 'Vendor\ProductController@newProduct')->name('newProduct');

Route::get('/product/{id?}', 'Vendor\ProductController@editProduct')->name('editProduct');

Route::post('/product', 'Vendor\ProductController@store')->name('storeProduct');

Route::post('/uploadProductImage', 'Vendor\UploadController@postImages')->name('uploadProductImage');

Route::post('/removeProductImage', 'Vendor\UploadController@removeImages')->name('removeProductImage');

Route::get('/vendorlist', 'Vendor\VendorsController@getHomeData');

Route::get('/delete-product/{id}', 'Vendor\VendorsController@deleteProduct');

Route::get('search', 'Vendor\VendorsController@getSearch');

Auth::routes();

Route::get('users/login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);

Route::get('/vendorLogin', 'Auth\LoginController@showVendorLoginForm');

Route::get('/vendorRegister', 'Auth\LoginController@register');

Route::group(array('prefix' => 'vendor', 'namespace' => 'Vendor', 'middleware' => 'vendor'), function () {

    Route::get('/', 'VendorsController@home');

    Route::get('/login', 'VendorsController@showLoginForm');

    Route::get('/logout', 'VendorsController@logout');

    Route::get('/product/new', 'VendorsController@createProduct');

    Route::get('/product/{id}', 'VendorsController@editProduct');

});
