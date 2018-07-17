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
#
Route::get('/', function () {
   return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Rotas da autenticação

//Route::get ('/login', 'AutenticaController@telaLogin');
#Route::get('login', ['as' => 'login', 'uses' => 'AutenticaController@telaLogin']);

#Route::post ('/login', 	'AutenticaController@login');
#Route::get  ('/logout', 'AutenticaController@logout');

//Autenticação pelo Facebook
Route::get('loginFacebook', 'FacebookController@login');
Route::get('facebook', 'FacebookController@pageFacebook');

/*Route::get('loginFacebook/callback', 	'FacebookController@callback');*/

//index do site
//Route::get ('/', ['as' => 'index', 'uses' => 'PrincipalController@index']);

 