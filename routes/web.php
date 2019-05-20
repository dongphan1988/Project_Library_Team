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
Route::group(['prefix'=>'roles'],function (){
    Route::get('/','RoleController@index')->name('roles.index');
    Route::get('/{id}/delete','RoleController@destroy')->name('roles.destroy');
    Route::get('/{id}/delete','RoleController@destroy')->name('roles.destroy');
    Route::get('/create','RoleController@create')->name('roles.create');
    Route::post('/create','RoleController@store')->name('roles.store');
    Route::get('{id}/update','RoleController@edit')->name('roles.edit');
    Route::post('{id}/update','RoleController@update')->name('roles.update');
});
Route::group(['prefix'=>'books'],function (){
   Route::get('/','BookController@index')->name('books.index');
   Route::get('/create','BookController@create')->name('books.create');
   Route::post('/create','BookController@store')->name('books.store');
   Route::get('{id}/delete','BookController@destroy')->name('books.destroy');
   Route::get('{id}/update','BookController@edit')->name('books.edit');
   Route::post('{id}/update','BookController@update')->name('books.update');
});
Route::group(['prefix'=>'carts'],function (){
   Route::get('/','CartController@index')->name('carts.index');
   Route::get('{id}/add','CartController@add')->name('carts.add');
});
Route::get('/home', 'LoginController@home')->name('home');
Route::get('/login', 'LoginController@getLogin')->name('get.login');
Route::post('login', 'LoginController@postLogin')->name('post.login');

Route::get('/', 'HomeController@index');