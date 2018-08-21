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
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/// rota para buscar setores de uma determinada secretaria
Route::get("/setoresporsecretaria/{id}", "Api\SetorController@setoresporsecretaria");

/// rota para buscar cargos de um determinado setor
Route::get("/cargosporsecretaria/{id}", "Api\CargoController@cargosporsecretaria");