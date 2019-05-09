<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sistema;
use App\Models\Role;

class RoleController extends Controller
{
    public function verificaRoleExiste($sistema_id, $nome_role){

        //Obter a secretaria por id
        $existe = Role::where('nome', '=', $nome_role)->where('sistema_id', '=', $sistema_id)->get();

        return sizeof($existe);

    }
}
