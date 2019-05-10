<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sistema;

class SistemaController extends Controller
{
    public function verificaSistemaExiste($nome_sistema){

        //Obter a secretaria por id
        $existe = Sistema::where('nome', '=', $nome_sistema)->get();

        return sizeof($existe);

    }
}
