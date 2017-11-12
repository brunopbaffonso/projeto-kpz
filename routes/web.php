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

Route::get('/', function () {
    return view('inicio');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::group(['middleware' => 'auth'], function() {
    Route::resource('clientes', 'ClienteController');
    Route::resource('fornecedores', 'FornecedorController');
    Route::resource('insumos', 'InsumoController');
    Route::resource('items', 'ItemController');
    Route::resource('modelos', 'ModeloController');
    Route::resource('ocs', 'OCController');
    Route::resource('oss', 'OSController');
    Route::resource('subprodutos', 'SubprodutoController');
    Route::resource('usuarios', 'UsuarioController');
//});