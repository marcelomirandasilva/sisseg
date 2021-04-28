<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Setor;
use App\Models\Secretaria;

class SetorController extends Controller
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

        //Obter todos os setores do banco de dados
        $setores = Setor::all();
        // dd($setores);

        // Chamar a view passando a variável para ela
        return view('setores.index', compact('nome_usuario', 'foto_usuario', 'setores'));
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

        $setores = Setor::all();

        return view('setores.create', compact('nome_usuario', 'foto_usuario', 'secretarias', 'setores'));
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
            'secretaria_id' => 'required',
            'operante' => 'required',

        ]);

        $novo_setor = Setor::create($request->all());

        return redirect('setores');
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

         $setor = Setor::find($id);

         return view('setores.edit', compact('setor', 'nome_usuario', 'foto_usuario'));
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
            'secretaria' => 'required',
            'operante' => 'required',
        ]);

        // Procurar o setor pelo id
        $setor = Setor::find($id);

        // Preencher os campos dele com os valores novos
        $setor->fill($request->all());

        // Salvar as mudanças no banco
        $setor->save();

        // Redirecionar para o index de setores
        return redirect('setores');
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
