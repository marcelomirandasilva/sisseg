<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Sistema;
use App\Models\Role;


class RoleController extends Controller
{
/* 	public function __construct()
	{
		$this->middleware('auth');
	}
 */
	public function index()
	{

		//$retorno = DB::select("select consulta_role(69, 'SGF', 'FISCAL') as retorno");

		//$func = Funcionario::find(69)->roles()->get();

		//dd($retorno[0]->retorno);


		

		$roles 		= Role::all();
		$sistemas = Sistema::all()->sortBy('nome');

		return view('roles.index', compact('roles','sistemas'));
	}
	
	public function create()
	{
		$sistemas = Sistema::all()->sortBy('nome');

		return view('roles.create', compact('sistemas'));
	}

	public function store(Request $request)
	{
	
		$this->validate($request, [
			'nome' => 'required',            
			'sistema_id' => 'required',
  		]);

		$nova_role = Role::create($request->all());

		return redirect('roles');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$sistemas = Sistema::all()->sortBy('nome');
		$role = Role::find($id);

		return view('roles.create', compact('role', 'sistemas'));
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'nome' => 'required',            
			'sistema_id' => 'required',
		]);
		
		$role = Role::find($id);

		$role->fill($request->all());

		$role->save();

		return redirect('roles');

	}
	public function destroy($id)
	{
		//
	}


	/* ====================================================================== */
	/* ====================================================================== */
	/* ====================================================================== */

	public function roles_funcionario($id)
	{
		
		$roles 		= Role::all();
		$sistemas 	= Sistema::all();
		
		$funcionario 			= Funcionario::find($id);
		//$roles_funcionario 	= Funcionario::find(69)->roles()->orderBy('nome');


		return view('funcionarios.roles', compact('roles', 'funcionario','sistemas'));
	}

	
	public function buscaRoleSistema($id)
	{
		$sistema = Sistema::find($id);

		$roles = $sistema->roles;
		//$roles_funcionario 	= Funcionario::find(69)->roles()->orderBy('nome');
		return $roles;
	}

	public function associacaoRole(Request $request)
	{
		$funcionario 	= Funcionario::find($request->funcionario_id);

		if($request->acao == "I"){
			$ja_possui = Funcionario::find($request->funcionario_id)->roles()->where('roles.id','=', $request->role_id)->get();
			
			if (sizeof($ja_possui) > 0 ) {
				return "JA_POSSUI";
			}else{

				$funcionario->roles()->attach($request->role_id);
				return "OK";
			}


		}elseif($request->acao == "R"){
			$funcionario->roles()->detach($request->role_id);
			return "OK" ;
		};

	}


}
