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

    Route::get('/home', 'ProdutoController@index')->name('home');
    Route::any('/buscar', 'BuscaController@index')->name('buscar');
    Route::resources([
        'produtos' => 'ProdutoController',
        'categorias' => 'CategoriaController'
    ]);
});
