<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsuarioController extends Controller
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

        //Obter todos os usuários do banco de dados
        $usuarios = User::all();
            
        // Chamar a view passando a variável para ela
        return view('usuarios.index', compact('nome_usuario', 'foto_usuario', 'usuarios'));
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

        return view('usuarios.create', compact('nome_usuario', 'foto_usuario'));
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|same:password_confirmation',
            'password_confirmation' => 'required|min:5',
        ]);

        $novo_usuario = User::create($request->all());

        $novo_usuario->password = Hash::make($request->password);

        $novo_usuario->save();

        return redirect('usuarios');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Procurar o usuário no banco pelo id

       



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Armazenando o nome do usuário logado na variável $nome_usuario
        $nome_usuario = Auth::user()->name;
        $foto_usuario = asset("images/brasao.png");

         $usuario = User::find($id);
         
         return view('usuarios.edit', compact('usuario', 'nome_usuario', 'foto_usuario'));

         
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
            'name' => 'required',
            'email' => 'required|email',
        ]);

        // Procurar o usuário pelo id
        $usuario = User::find($id);

        // Preencher os campos dele com os valores novos
        $usuario->fill($request->all());

        // Salvar as mudanças no banco
        $usuario->save();

        // Redirecionar para o index de usuários
        return redirect('usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);

        $usuario->delete();

    }
}
