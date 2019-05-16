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

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', 'CategoryController@index')->name('categories.index');
    Route::get('/create', 'CategoryController@create')->name('categories.create');
    Route::post('/create', 'CategoryController@store')->name('categories.store');
    Route::get('/{id}/edit', 'CategoryController@edit')->name('categories.edit');
    Route::post('/{id}/edit', 'CategoryController@update')->name('categories.update');
    Route::get('/{id}/destroy', 'CategoryController@destroy')->name('categories.destroy');
});
Route::group(['prefix'=>'users'],function (){
   Route::get('/','UserController@index')->name('users.index');
   Route::get('/create','UserController@create')->name('users.create');
   Route::post('/create','UserController@store')->name('users.store');
   Route::get('{id}/delete','UserController@destroy')->name('users.destroy');
   Route::get('{id}/update','UserController@edit')->name('users.edit');
   Route::post('{id}/update','UserController@update')->name('users.update');
});
