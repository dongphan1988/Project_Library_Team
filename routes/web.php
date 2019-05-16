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

Route::group(['prefix'=>'users'],function (){
   Route::get('/','UserController@index')->name('users.index');
});
Route::get('/','WelcomeController@home')->name('home.index');
Route::group(['prefix'=>'login'],function (){
   Route::get('/login','WelcomeController@login')->name('login.index');
   Route::post('/login','WelcomeController@logintolibrary')->name('login.library');
});
