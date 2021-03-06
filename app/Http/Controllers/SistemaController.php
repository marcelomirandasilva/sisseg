<?php

namespace App\Http\Controllers;

use App\Models\Sistema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SistemaController extends Controller
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

         //Obter todos os sistemas do banco de dados

        $sistemas = Sistema::all();
        // dd($sistemas);

        // Chamar a view passando a variável para ela

        return view('sistemas.index', compact('nome_usuario', 'foto_usuario', 'sistemas'));

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

        //Obter todos os cargos do banco de dados

        $sistemas = Sistema::all();

        return view('sistemas.create', compact('nome_usuario', 'foto_usuario', 'sistemas'));
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
            'ativo' => 'required',

        ]);

        $novo_sistema = Sistema::create($request->all());

        return redirect('sistemas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sistema  $sistema
     * @return \Illuminate\Http\Response
     */
    public function show(Sistema $sistema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sistema  $sistema
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          // Armazenando o nome do usuario logado na variável $nome_usuario
        $nome_usuario = Auth::user()->name;
        $foto_usuario = asset("images/brasao.png");

         $sistema = Sistema::find($id);
         // dd($sistema);

         return view('sistemas.edit', compact('sistema', 'nome_usuario', 'foto_usuario', 'sistemas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sistema  $sistema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validar os campos
        $this->validate($request, [
            'nome' => 'required',
            'ativo' => 'required',
        ]);

        // Procurar o sistema pelo id
        $sistema = Sistema::find($id);

        // Preencher os campos dele com os valores novos
        $sistema->fill($request->all());

        // Salvar as mudanças no banco
        $sistema->save();

        // Redirecionar para o index de sistemas
        return redirect('sistemas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sistema  $sistema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sistema $sistema)
    {
        //
    }
}
