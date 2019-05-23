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

Route::group(['middleware' => 'language'], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();
    Route::get('logout', 'Auth\LoginController@logout', function () {
        return abort(404);
    });
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/produtos', 'HomeController@index')->name('produtos');
    Route::get('/categorias', 'HomeController@index')->name('categorias');
});
