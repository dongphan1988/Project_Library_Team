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
   Route::get('/create','UserController@create')->name('users.create');
   Route::post('/create','UserController@store')->name('users.store');
   Route::get('{id}/delete','UserController@destroy')->name('users.destroy');
   Route::get('{id}/update','UserController@edit')->name('users.edit');
   Route::post('{id}/update','UserController@update')->name('users.update');
});
