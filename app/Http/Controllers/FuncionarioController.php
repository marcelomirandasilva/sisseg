<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Funcionario;
use App\Models\Secretaria;
use App\Models\Cargo;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Armazenando o nome do usuário logado na variável $nome_usuario
        $nome_usuario = Auth::user()->name;
        $foto_usuario = asset("images/brasao.png");

        //Obter todos as secretarias do banco de dados

        $secretarias = Secretaria::all();
        // dd($secretarias);

         //Obter todos os cargos do banco de dados

        $cargos = Cargo::all();

        //Obter todos os tipos do banco de dados

        $tipos = pegaValorEnum('funcionarios', 'tipo');

        return view('funcionarios.create', compact('nome_usuario', 'foto_usuario', 'secretarias', 'cargos', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Armazenando o nome do usuário logado na variável $nome_usuario
        $nome_usuario = Auth::user()->name;
        $foto_usuario = asset("images/brasao.png");

        // Validar os campos
        $this->validate($request, [
            'nome' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|same:password_confirmation',
            'password_confirmation' => 'required|min:5',
            'cargo' => 'required',
            'tipo' => 'required',
            'setor' => 'required',
            'secretaria' => 'required',
            'sistema' => 'required',
        ]);

        $novo_funcionario = Funcionario::create($request->all());

        return redirect('funcionarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
