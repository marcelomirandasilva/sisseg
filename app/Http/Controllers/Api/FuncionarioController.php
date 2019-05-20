<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\API\ApiError;

class FuncionarioController extends Controller
{
	public function __construction(Funcionario $funcionario)
	{
		$this->funcionario = $funcionario;
	}

	public function index()
	{
		$funcionarios = Funcionario::all();
		return response()->json(['data' => $funcionarios]); 
	}
	
	public function create()
	{
		//
	}

	public function store(Request $request)
	{
		try {
			$funcionarioData = $request->all();
			Funcionario::create($funcionarioData);

			$retorno = ['data' => ['msg' => 'Funcionario criado!']];
			return response()->json($retorno, 201); 

		} catch (\Exception $e) {
			if (config('app.debug')) {
				return response()->json(ApiError::errorMessage($e->getMessage(), 1010)); 
			}

			return response()->json(ApiError::errorMessage("Erro ao executar operação", 1010)); 
		}
	}

	public function show( $id)
	{
		$data = Funcionario::find($id);
		return response()->json(['data' => $data]); 
	}

	public function edit($id)
	{
		//
	}

	public function update(Request $request, $id)
	{
		try {
			$funcionario = Funcionario::find($id);
			$funcionario->update($request->all());

			$retorno = ['data' => ['msg' => 'Funcionario Alterado!']];
			return response()->json($retorno, 201); 

		} catch (\Exception $e) {
			if (config('app.debug')) {
				return response()->json(ApiError::errorMessage($e->getMessage(), 1010)); 
			}

			return response()->json(ApiError::errorMessage("Erro ao executar operação", 1010)); 
		}

	}

	public function destroy($id)
	{
		//
	}
}
