<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Funcionario;
use App\Models\Secretaria;
use App\Models\Cargo;
use App\Models\Setor;
use App\Models\Sistema;
use Illuminate\Validation\Rule;


use Illuminate\Support\Facades\Mail;
use App\Mail\EnviaSenha;
use App\Mail\NovaSenha;
use App\Mail\GesolToSisrel;

class FuncionarioController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
			// Armazenando o nome do usuário logado na variável $nome_usuario
		$nome_usuario = Auth::user()->name;
		$foto_usuario = "images/brasao.png";

		//Obter todos as funcionarios do banco de dados

		$funcionarios = Funcionario::all();
		// dd($funcionarios);

		// Chamar a view passando a variável para ela
		return view('funcionarios.index', compact('nome_usuario', 'foto_usuario', 'funcionarios'));
	}

	public function create()
	{
		$titulo = "Cadastro de Funcionarios";
		$secretarias = Secretaria::all();
		
		$tipos = pegaValorEnum('funcionarios', 'tipo');
		$categorias = pegaValorEnum('funcionarios', 'categoria_cnh');

		return view('funcionarios.create', compact('titulo', 'secretarias', 'tipos','categorias'));
	}
	public function store(Request $request)
	{
		
		// Validar os campos
		$this->validate($request, [
				'nome' => 'required',
				'email' => 'email|unique:funcionarios',
				'cpf' => 'required|unique:funcionarios',
				'tipo' => 'required',
				'secretaria_id' => 'required',
		]);
		//dd($request->all());
		
		if ($request->motorista){      
			$data 				= str_replace('/', '-', $request->validade_cnh );
			$data_formatada 	= date("Y-m-d", strtotime($data)				)	;

			$request->merge(['validade_cnh' => $data_formatada]);
			$request->merge(['cnh' 				=> str_replace('.', "", $request->cnh)]);
			$request->merge(['motorista' 		=> str_replace('on', "1", $request->motorista)]);
		}

		if( $request->email){
			$senha_gerada       = str_random(6);
		}else{
			$cpf = retiraMascaraCPF($request->cpf);
			$senha_gerada       = $cpf;
		}
		$request->merge(['password' => bcrypt($senha_gerada)]);

		//dd($request->all());
		try {
				$novo_funcionario = Funcionario::create($request->all());

		} catch (\Illuminate\Database\QueryException $exception) {
				// You can check get the details of the error using `errorInfo`:
				$errorInfo = $exception->errorInfo;
		
				DB::rollBack();
				if($errorInfo[0] = 2300){
					return back()->withInput()->with('error', 'Falha ao criar o Funcionário. Email já está cadastrado');  
				}
			return back()->withInput()->with('error', 'Falha ao criar o Funcionário. cod:'. $errorInfo[0]);  
		}

		if($novo_funcionario){
		
			DB::commit();
			//se tiver email cadastrado envia a ele a senha gerada
			if( $request->email){
				Mail::to($request->email)->send(new EnviaSenha($novo_funcionario, $senha_gerada));
				}

				return redirect('funcionarios')->with('sucesso', 'Usuario criado com sucesso!');
		} else {
			//Fail, desfaz as alterações no banco de dados
			DB::rollBack();
			return back()->withInput()->with('error', 'Falha ao criar o Usuario.');    
		}
		
	}

	public function edit($id)
	{
		$funcionario = Funcionario::find($id);

		$titulo = "Edição de Funcionarios";
		$secretarias = Secretaria::all();
		
		$tipos = pegaValorEnum('funcionarios', 'tipo');
		$categorias = pegaValorEnum('funcionarios', 'categoria_cnh');

		
		return view('funcionarios.create', compact('funcionario', 'titulo', 'secretarias', 'tipos','categorias'));         
	}


	public function update(Request $request, $id)
	{
//		dd($request->all());
		$this->validate($request, [
			'nome' => 'required',
			'email' => 'email|max:255|unique:funcionarios,email,'.$id,
			'cpf' => 'required',
			'tipo' => 'required',
			'secretaria_id' => 'required',
			
			]);
			
			if ($request->motorista){
				$data 				= str_replace('/', '-', $request->validade_cnh );
				$data_formatada 	= date("Y-m-d", strtotime($data)				)	;

				$request->merge(['validade_cnh' => $data_formatada]);
				$request->merge(['cnh' => str_replace('.', "", $request->cnh)]);
				$request->merge(['motorista' => str_replace('on', "1", $request->motorista)]);
			}
			//dd($request->all());
		// Procurar o funcionario pelo id
		$funcionario = Funcionario::find($id);
		
		// Preencher os campos dele com os valores novos
		$funcionario->fill($request->all());
		
		
		//dd($funcionario);
		$funcionario->save();
		
		
		if($funcionario){
			DB::commit();
			return redirect('funcionarios')->with('sucesso', 'Funcionario Editado com sucesso!');
		} else {
			//Fail, desfaz as alterações no banco de dados
			DB::rollBack();
			return back()->withInput()->with('error', 'Falha ao Editar o Funcionario.');    
		}
	

	}


	public function destroy($id)
	{
		$funcionario = Funcionario::find($id);
		
		$funcionario->delete();
	}


/* ================================================================== */
/* ================================================================== */
/* ================================================================== */
/* ================================================================== */


public function ZerarSenhaFuncionario(Request $request)
{
	// busca o usuario
	$funcionario    = Funcionario::find($request->id);    
	$enviar_email   = $funcionario->email;
	
	
	//gera nova senha
	$senha_gerada       		= str_random(6);
	$funcionario->password 	= bcrypt($senha_gerada);
	
	//$senha_gerada       	= substr($funcionario->cpf);
	//$funcionario->password 	= bcrypt($senha_gerada);

	//salva o usuário
	$funcionario->save();



	Mail::to($enviar_email)->send(new NovaSenha($funcionario, $senha_gerada));

	/* Mail::send('emails.senha',[ 'email' => $funcionario->email, 'senha' => $senha_gerada ], function($message) use ($enviar_email)
	{
		$message->to($enviar_email);
		//$message->to('marcelo.miranda.pp@gmail.com');
		$message->subject('Senha de acesso ao SGF');
	});
 */
	return response('ok', 200);	

}	


	
	public function SalvarSenha(Request $request)
	{
		//não deixa usar o cpf como senha
		if ( retiraMascaraCPF(Auth()->user()->cpf)  == $request->password)
		{
			return back()->withErrors('Essa senha não pode ser utilizada. Tente outra!');
		}


		// Validar
		$this->validate($request, [
			'password_atual'        => 'required',
			'password'              => 'required|min:6|confirmed',
			'password_confirmation' => 'required|min:6'
		]);

			
		
//
		// Obter o usuário
		$usuario = User::find(Auth::user()->id);



		if (Hash::check($request->password_atual, $usuario->password))
		{

			$usuario->update(['password' => bcrypt($request->password)]);            

			return redirect('/')->with('sucesso','Senha alterada com sucesso.');
		}else{

			return back()->withErrors('Senha atual não confere');
		}

	}



	public function zerarguarda()
{
	// busca o usuario
	$funcionarios    = Funcionario::where('secretaria_id',9)->get();    
	
	foreach ($funcionarios as $key => $funcionario) {
		echo ("<pre>");

		print_r($funcionario->nome);	
		print_r("  -  ");	
		print_r($funcionario->email);	
		print_r("  -  ");	
		print_r($funcionario->cpf);	
		print_r("  -  ");	

		$cpf = trim($funcionario->cpf);
		$cpf = str_replace(".", "", $cpf);
		$cpf = str_replace("-", "", $cpf);
		
		print_r($cpf);	

		echo ("</pre>");
		
		$funcionario->password 	= bcrypt($cpf);
		$funcionario->save();

		if( $funcionario->email){
			//Mail::to($funcionario->email)->send(new NovaSenha($funcionario, $cpf));
			Mail::to($funcionario->email)->send(new GesolToSisrel($funcionario, $cpf));
		}

	}
	
	//dd("dsfdsf");
	
	return response('ok', 200);	

}




}
