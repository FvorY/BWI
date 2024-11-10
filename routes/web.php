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
Route::get('/data-wakaf', 'DataWakafController@index')->name('data-wakaf');
Route::get('/data-wakaf/get-data', 'DataWakafController@getData')->name('data-wakaf.getData');
Route::get('/article/{id}', 'ArticleController@index')->name('article');
Route::get('/jumlah-wakaf', 'JumlahWakafController@index')->name('jumlah-wakaf');
Route::get('/profile-wakif/{wakif}', 'ProfileWakifController@index')->name('profile-wakif');
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/vision-mission', 'VisionMissionController@index')->name('vision-mission');
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

Route::get('/cities', 'CitiesController@index');
Route::get('/citiestable', 'CitiesController@datatable');
Route::post('/simpancities', 'CitiesController@simpan');
Route::get('/editcities', 'CitiesController@edit');
Route::get('/hapuscities', 'CitiesController@hapus');

Route::get('/subdistricts', 'SubdistrictsController@index');
Route::get('/subdistrictstable', 'SubdistrictsController@datatable');
Route::post('/simpansubdistricts', 'SubdistrictsController@simpan');
Route::get('/editsubdistricts', 'SubdistrictsController@edit');
Route::get('/hapussubdistricts', 'SubdistrictsController@hapus');

Route::get('/vilages', 'VilagesController@index');
Route::get('/vilagestable', 'VilagesController@datatable');
Route::post('/simpanvilages', 'VilagesController@simpan');
Route::get('/editvilages', 'VilagesController@edit');
Route::get('/hapusvilages', 'VilagesController@hapus');

Route::get('/wakafland', 'WakaflandController@index');
Route::get('/wakaflandtable', 'WakaflandController@datatable');
Route::post('/simpanwakafland', 'WakaflandController@simpan');
Route::get('/editwakafland', 'WakaflandController@edit');
Route::get('/hapuswakafland', 'WakaflandController@hapus');

Route::get('/wakifs', 'WakifsController@index');
Route::get('/wakifstable', 'WakifsController@datatable');
Route::post('/simpanwakifs', 'WakifsController@simpan');
Route::get('/editwakifs', 'WakifsController@edit');
Route::get('/hapuswakifs', 'WakifsController@hapus');

Route::get('/nadzirs', 'NadzirsController@index');
Route::get('/nadzirstable', 'NadzirsController@datatable');
Route::post('/simpannadzirs', 'NadzirsController@simpan');
Route::get('/editnadzirs', 'NadzirsController@edit');
Route::get('/hapusnadzirs', 'NadzirsController@hapus');

}); // End Route Groub middleware auth