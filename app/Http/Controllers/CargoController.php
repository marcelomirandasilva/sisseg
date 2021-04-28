<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cargo;
use App\Models\Funcionario;
use App\Models\Secretaria;

class CargoController extends Controller
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
        $foto_usuario = asset("images/brasao.png");

        //Obter todos as cargos do banco de dados

        $cargos = Cargo::all();
        //dd($cargos->all());

        // Chamar a view passando a variável para ela
        return view('cargos.index', compact('nome_usuario', 'foto_usuario', 'cargos'));
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

        return view('cargos.create', compact('nome_usuario', 'foto_usuario', 'secretarias', 'cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Armazenando o nome do usuário logado na variável $nome_usuario
        $nome_usuario = Auth::user()->name;
        $foto_usuario = asset("images/brasao.png");

        // Validar os campos
        $this->validate($request, [
            'nome' => 'required',
            'tipo' => 'required',
            'secretaria_id' => 'required',

        ]);

        $novo_cargo = Cargo::create($request->all());

        return redirect('cargos');
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
         // Armazenando o nome do usuario logado na variável $nome_usuario
        $nome_usuario = Auth::user()->name;
        $foto_usuario = asset("images/brasao.png");

         $cargo = Cargo::find($id);

         return view('cargos.edit', compact('cargo', 'nome_usuario', 'foto_usuario'));
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
        // Validar os campos
        $this->validate($request, [
            'nome' => 'required',
            'tipo' => 'required',
            'secretaria' => 'required',

        ]);

        // Procurar o cargo pelo id
        $cargo = Cargo::find($id);

        // Preencher os campos dele com os valores novos
        $cargo->fill($request->all());

        // Salvar as mudanças no banco
        $cargo->save();

        // Redirecionar para o index de cargos
        return redirect('cargos');
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
