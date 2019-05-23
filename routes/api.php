<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
// |
// */

//  Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['middleware' => 'auth:api'], function(){
//     Route::apiResource('/funcionarios', "Api\FuncionarioController");
//     Route::get("/setoresporsecretaria/{id}", "SetorController@setoresporsecretaria");
//     Route::get("/cargosporsecretaria/{id}", "Api\CargoController@cargosporsecretaria");


// });


//Route::group(['middleware' => 'auth:api'], function(){
   /// rota para buscar setores de uma determinada secretaria
   Route::get("/setoresporsecretaria/{id}", 				"Api\SetorController@setoresporsecretaria");
   /// rota para buscar cargos de um determinado setor
   Route::get("/cargosporsecretaria/{id}", 				"Api\CargoController@cargosporsecretaria");

   /// rota para verificar se o NOME DO SISTEMA já está cadastrado
   Route::get("/verificaSistemaExiste/{sistema}", 		"Api\SistemaController@verificaSistemaExiste");

   /// rota para verificar se o NOME DA ROLE já existe em determinado SISTEMA
   Route::get("/verificaRoleExiste/{sistema}/{role}", "Api\RoleController@verificaRoleExiste");

   Route::post("/verificaRoleFuncionario", 				"Api\RoleController@verificaRoleFuncionario");

   Route::post("/acesso", 				"Api\AcessoController@acesso");

   //resource
   Route::apiResource('/funcionario', 						"Api\FuncionarioController");

//});