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


Route::get('/login' , function(){
	return view('auth.login');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

////////////////////////////// RESOURCES

Route::resource('/usuarios',    "UsuarioController");
Route::resource('/sistemas',    'SistemaController');
Route::resource('/opcoes',      'OpcoesController');
Route::resource('/secretarias', "SecretariaController");
Route::resource('/funcionarios',"FuncionarioController");
Route::resource('/setores',     "SetorController");
Route::resource('/cargos',      "CargoController");
