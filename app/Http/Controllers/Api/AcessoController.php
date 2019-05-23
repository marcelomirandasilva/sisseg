<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\API\ApiError;

class AcessoController extends Controller
{


	public function acesso(Request $request){

		$funcionario = Funcionario::where('email', $request->email)->first();

	 	$data = DB::select("select consulta_role($funcionario->id , '$request->sistema', '$request->role') as acesso");
   
		return response()->json(['data' => $data]); 

    }
	

}
