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



Route::get('/', 'HomefrontController@index')->name('/');
Route::get('/visimisi', 'HomefrontController@visimisi');

Route::group(['middleware' => 'guest'], function () {

    Route::get('/admin', function () {
        return view('auth.login');
    })->name('admin');

    Route::get('login', 'loginController@authenticate')->name('login');
});


Route::group(['middleware' => 'auth'], function () {

Route::get('/home', 'HomeController@index')->name('index');
Route::get('logout', 'HomeController@logout')->name('logout');

Route::get('/users', 'UsersController@index');
Route::get('/userstable', 'UsersController@datatable');
Route::post('/simpanusers', 'UsersController@simpan');
Route::get('/editusers', 'UsersController@edit');
Route::get('/hapususers', 'UsersController@hapus');

Route::get('/postscontent', 'PostController@index');
Route::get('/tambahpostscontent', 'PostController@tambah');
Route::get('/postscontenttable', 'PostController@datatable');
Route::post('/simpanpostscontent', 'PostController@simpan');
Route::get('/editpostscontent/{id}', 'PostController@edit');
Route::get('/doeditpostscontent', 'PostController@doedit');
Route::get('/removeimagepostscontent', 'PostController@removeimage');
Route::get('/hapuspostscontent', 'PostController@hapus');

Route::get('/profil/visimisi', 'VisimisiController@index');
Route::post('/profil/visimisi/save', 'VisimisiController@save');


}); // End Route Groub middleware auth
