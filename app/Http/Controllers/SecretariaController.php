<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Secretaria;

class SecretariaController extends Controller
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

        //Obter todos as secretarias do banco de dados

        $secretarias = Secretaria::all();        

        // Chamar a view passando a variável para ela
        return view('secretarias.index', compact('nome_usuario', 'foto_usuario', 'secretarias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

         $secretaria = Secretaria::find($id);
         
         return view('secretarias.edit', compact('secretaria', 'nome_usuario', 'foto_usuario'));
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
            'secretario' => 'required',
            'sigla' => 'required',
            'operante' => 'required',
        ]);

        // Procurar o secretaria pelo id
        $secretaria = Secretaria::find($id);

        // Preencher os campos dele com os valores novos
        $secretaria->fill($request->all());

        // Salvar as mudanças no banco
        $secretaria->save();

        // Redirecionar para o index de secretarias
        return redirect('secretarias');
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
