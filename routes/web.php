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
})->name('getHome');

Auth::routes();

Route::get('/login', 'Auth\LoginController@getLogin');
Route::post('/login', 'Auth\LoginController@postLogin');
Route::post('/register','Auth\RegisterController@createUser');

Route::get('/vendorLogin', 'Auth\LoginController@getLoginVendor');
Route::post('/vendorLogin', 'Auth\LoginController@postLoginVendor');
Route::post('/vendorRegister','Auth\RegisterController@createVendor');
Route::get('/vendorRegister','Auth\LoginController@getVendorRegister');

Route::get('/logout','Auth\LoginController@logout');

Route::group(array('prefix' => 'vendor', 'namespace' => 'Vendor', 'middleware' => 'vendor'), function () {

        Route::get('/', 'VendorsController@home');

        Route::get('/logout', 'VendorsController@logout');

        Route::get('/createPost','VendorPostController@create');

        Route::post('/postPost','VendorPostController@store');

    });

Route::group(array('prefix' => 'user', 'namespace' => 'User', 'middleware' => 'user') , function () {

        Route::get('/', 'UserController@home');

    });

Route::get('/a', function () {
    return view('vendors.shared.master');
});

Route::get('/test', function () {
    return view('vendors.products.edit');
});

Route::get('/test/{id?}', function () {
    return view('vendors.products.edit');
});

Route::post('/test', 'Vendor\ProductController@store')->name('storeProduct');

Auth::routes();

Route::get('users/login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);

Route::group(array('prefix' => 'vendor', 'namespace' => 'Vendor', 'middleware' => 'vendor'), function () {

    Route::get('/', 'VendorsController@home');

    Route::get('/login', 'VendorsController@showLoginForm');

    Route::get('/logout', 'VendorsController@logout');

    Route::get('/product/new', 'VendorsController@createProduct');

    Route::get('/product/{id}', 'VendorsController@editProduct');

});
