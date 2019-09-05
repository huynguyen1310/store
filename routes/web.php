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
Route::get('callback/{social}','HomeController@handleProviderCallback');
Route::get('login/{social}','HomeController@redirectProvider')->name('login.social');
Route::get('/login', 'HomeController@login');
Route::post('/login', 'HomeController@postLogin')->name('post.login');
Route::get('/register', 'HomeController@register');
Route::post('/register', 'HomeController@postRegister')->name('register');
Route::get('logout','HomeController@logout');


Route::get('getproducttype/{id}','AjaxController@getproducttype');


Route::group(['prefix' => 'admin'] , function () {
    Route::resource('category','CategoryController');
    Route::resource('product-type','ProductTypeController');
    Route::resource('product','ProductController');
});