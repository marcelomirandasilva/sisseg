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


/* Route::get('/login' , function(){
	return view('auth.login');
});
 */
//Auth::routes();

// Authentication Routes...
$this->get('login', 		'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 	'Auth\LoginController@login');
$this->post('logout',	'Auth\LoginController@logout')->name('logout');

// Registration Routes...
//$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 				'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 			'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 	'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 			'Auth\ResetPasswordController@reset');

Route::get('/', 'HomeController@index')->name('home');



/* SENHA */
/* ======================================================================================== */
Route::post('/zerarsenhafuncionario',	    'FuncionarioController@ZerarSenhaFuncionario');
Route::post('/enviarsenhafuncionario',		'FuncionarioController@EnviarSenhaFuncionario');
Route::post('/testaemail',	                'FuncionarioController@testaEmail');

/* ROLES */
/* ================================================ */
Route::resource('/roles',       			"RoleController");
$this->get('/funcionario/roles/{id}', 	'RoleController@roles_funcionario')->name('funcionario.role');
Route::get('/buscaRoleSistema/{id}', 	"RoleController@buscaRoleSistema");
Route::post('/associacaoRole', 			"RoleController@associacaoRole");




Route::resource('/usuarios',    "UsuarioController");
Route::resource('/sistemas',    'SistemaController');
Route::resource('/opcoes',      'OpcoesController');
Route::resource('/secretarias', "SecretariaController");
Route::resource('/funcionarios',"FuncionarioController");
Route::resource('/setores',     "SetorController");
Route::resource('/cargos',      "CargoController");
