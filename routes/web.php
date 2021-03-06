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

Route::get('/', 'HomeController@index');

Route::get('callback/{social}','UserController@handleProviderCallback');
Route::get('login/{social}','UserController@redirectProvider')->name('login.social');
Route::get('login', 'UserController@login');
Route::post('login', 'UserController@postLogin')->name('post.login');
Route::get('register', 'UserController@register');
Route::post('register', 'UserController@postRegister')->name('register');
Route::get('profile','UserController@profile')->name('profile');
Route::post('update-profile', 'CustomerController@store')->name('update-profile');
Route::get('logout','UserController@logout');
Route::get('admin/login','UserController@adminLogin')->name('login.admin');
Route::post('admin/login','UserController@postAdminLogin')->name('post.login.admin');
Route::get('admin/register','UserController@adminRegister')->name('register.admin');

Route::get('getproducttype/{id}','AjaxController@getproducttype');


Route::group(['prefix' => 'admin' , 'middleware' => 'adminMiddleware'] , function () {
    Route::get('/', function () {
        return view('admin.pages.dashboard');
    });
    Route::resource('category','CategoryController');
    Route::resource('product-type','ProductTypeController');
    Route::resource('product','ProductController');
    Route::resource('order', 'OrderController');
});

Route::resource('cart','CartController');
Route::get('add-cart/{id}','CartController@addCart')->name('addCart');
Route::get('checkout','CartController@checkout')->name('checkout');
Route::get('destroy-cart','CartController@destroyCart');
