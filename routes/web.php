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

Auth::routes();




Route::get('users/login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
/*Route::get('vendors/login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showVendorLoginForm'
]);*/
Route::get('/vendorLogin', "Auth\LoginController@showVendorLoginForm");
Route::get('/vendorRegister','Auth\LoginController@register');

Route::group(array('prefix' => 'vendor','namespace' => 'Vendor' , 'middleware' => 'vendor')
    ,
    function () {
        Route::get('/','VendorsController@home');

        Route::get('/login', "VendorsController@showLoginForm");

        Route::get('/logout',"VendorsController@logout");


    });
