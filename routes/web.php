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

Route::get('/index', 'HomeController@index')->name('getHome');

Auth::routes();

Route::get('/booking/{optionId?}', 'User\BookingController@store')->name('booking');

Route::post('/uploadProductImage', 'Vendor\UploadController@postImages')->name('uploadProductImage');

Route::post('/removeProductImage', 'Vendor\UploadController@removeImages')->name('removeProductImage');

Auth::routes();

Route::get('/getPlaces/{type?}', 'User\UserController@getPlaces')->name('getPlaces');

Route::get('/getProducts/{idPlace?}','User\UserController@getProducts')->name('getProducts');

Route::get('/booked', 'User\UserController@getBooked')->name('getBooked');

Route::get('/getPost/{id?}/show', 'User\UserController@getPostDetail')->name('getPostDetail');

Route::get('/login', 'Auth\LoginController@getLogin');

Route::post('/login', 'Auth\LoginController@postLogin');

Route::post('/register', 'Auth\RegisterController@createUser');

Route::get('/vendorLogin', 'Auth\LoginController@getLoginVendor');

Route::post('/vendorLogin', 'Auth\LoginController@postLoginVendor');

Route::post('/vendorRegister', 'Auth\RegisterController@createVendor');

Route::get('/vendorRegister', 'Auth\LoginController@getVendorRegister');

Route::get('/logout', 'Auth\LoginController@logout');

Route::group(array('prefix' => 'user', 'namespace' => 'User', 'middleware' => 'user'), function () {

});

Route::get('users/login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);

Route::group(array('prefix' => 'vendor', 'namespace' => 'Vendor', 'middleware' => 'vendor'), function () {

    Route::get('/', 'VendorsController@home');

    Route::get('/login', 'VendorsController@showLoginForm');

    Route::get('/createPost', 'VendorPostController@create')->name('createPost');

    Route::post('/createPost', 'VendorPostController@store')->name('storePost');

    Route::get('/posts/{id?}', 'VendorPostController@index')->name('indexPost');

    Route::post('/editPosts/{id?}/edit', 'VendorPostController@edit')->name('editPost');

    Route::post('/editPosts/{id?}/update', 'VendorPostController@update')->name('updatePost');

    Route::get('/editPosts/{id?}/delete', 'VendorPostController@destroy')->name('destroyPost');

    Route::get('/logout', 'VendorsController@logout');

    Route::get('/product/new', 'ProductController@newProduct')->name('newProduct');

    Route::get('/product/{id}', 'ProductController@editProduct')->name('editProduct');

    Route::post('/product', 'ProductController@store')->name('storeProduct');

    Route::get('/vendorlist', 'VendorsController@getHomeData')->name('listProduct');

    Route::get('/delete-product/{id?}', 'VendorsController@deleteProduct')->name('deleteProduct');

    Route::get('/createPlace', 'PlacesController@create')->name('showCreatePlaceForm');

    Route::post('/createPlace', 'PlacesController@store')->name('storePlace');

    Route::get('/places/{id?}', 'PlacesController@index')->name('indexPlace');

    Route::post('/editPlaces/{id?}/edit', 'PlacesController@edit')->name('editPlace');

    Route::post('/editPlaces/{id?}/update', 'PlacesController@update')->name('updatePlace');

    Route::get('/editPlaces/{id?}/delete', 'PlacesController@destroy')->name('destroyPlace');
});
