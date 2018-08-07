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

Route::get('/', 'HomeController@index')->name('getHome');

Route::get('/product', 'Vendor\ProductController@newProduct')->name('newProduct');

Route::get('/product/{id?}', 'Vendor\ProductController@editProduct')->name('editProduct');

Route::post('/product', 'Vendor\ProductController@store')->name('storeProduct');

Route::post('/uploadProductImage', 'Vendor\UploadController@postImages')->name('uploadProductImage');

Route::post('/removeProductImage', 'Vendor\UploadController@removeImages')->name('removeProductImage');

Route::get('/vendorlist', 'Vendor\VendorsController@getHomeData');

Route::get('/delete-product/{id}', 'Vendor\VendorsController@deleteProduct');

Route::get('search', 'Vendor\VendorsController@getSearch');

Auth::routes();

Route::get('/get-products/{type?}', 'User\UserController@getProducts')->name('getProducts');

Route::get('/product', 'Vendor\ProductController@newProduct')->name('newProduct');

Route::get('/product/{id?}', 'Vendor\ProductController@editProduct')->name('editProduct');

Route::get('/getPost/{id?}/show', 'User\UserController@getPostDetail')->name('getPostDetail');

Route::post('/product', 'Vendor\ProductController@store')->name('storeProduct');

Route::get('/login', 'Auth\LoginController@getLogin');

Route::post('/login', 'Auth\LoginController@postLogin');

Route::post('/register', 'Auth\RegisterController@createUser');

Route::get('/vendorLogin', 'Auth\LoginController@getLoginVendor');

Route::post('/vendorLogin', 'Auth\LoginController@postLoginVendor');

Route::post('/vendorRegister', 'Auth\RegisterController@createVendor');

Route::get('/vendorRegister', 'Auth\LoginController@getVendorRegister');

Route::get('/logout', 'Auth\LoginController@logout');


Route::group(array('prefix' => 'user', 'namespace' => 'User', 'middleware' => 'user'), function () {

    Route::get('/', 'UserController@home');

});

Route::get('/product', 'Vendor\ProductController@new')->name('newProduct');

Route::get('/product/{id?}', 'Vendor\ProductController@editProduct')->name('editProduct');

Route::post('/product', 'Vendor\ProductController@store')->name('storeProduct');


Route::get('users/login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);

Route::get('/vendorLogin', 'Auth\LoginController@showVendorLoginForm');

Route::get('/vendorRegister', 'Auth\LoginController@register');

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

    Route::get('/product/new', 'VendorsController@createProduct');

    Route::get('/product/{id}', 'VendorsController@editProduct');

    Route::get('/createPlace', 'PlacesController@create')->name('showCreatePlaceForm');

    Route::post('/createPlace', 'PlacesController@store')->name('storePlace');

    Route::get('/places/{id?}', 'PlacesController@index')->name('indexPlace');

    Route::post('/editPlaces/{id?}/edit', 'PlacesController@edit')->name('editPlace');

    Route::post('/editPlaces/{id?}/update', 'PlacesController@update')->name('updatePlace');

    Route::get('/editPlaces/{id?}/delete', 'PlacesController@destroy')->name('destroyPlace');
});

Route::get('/map', 'HomeController@getMap')->name('getMap');


Route::get('/test', function () {
    return view('vendors.shared.master');
});