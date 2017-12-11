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
    return view('home');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('items/create/{id}', 'ItemController@create');
    Route::get('relatorios', 'RelatorioController@index');

    Route::resource('clientes', 'ClienteController');
    Route::resource('fornecedores', 'FornecedorController');
    Route::resource('insumos', 'InsumoController');
    Route::resource('items', 'ItemController'); // Aqui deve ser criado um REDIRECT, de OS
    Route::resource('modelos', 'ModeloController');
    Route::resource('ocs', 'OCController');
    Route::resource('oss', 'OSController');
    Route::resource('subprodutos', 'SubprodutoController');
    Route::resource('usuarios', 'UsuarioController');

    Route::get('registra/item/{os_id}', 'OSController@itemOSS');
    Route::get('registra/insumo/{oc_id}', 'OCController@insumoOCS');

    Route::get('logout', 'UsuarioController@Logout');
});