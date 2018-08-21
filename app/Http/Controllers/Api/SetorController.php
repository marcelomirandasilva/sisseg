<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Secretaria;

class SetorController extends Controller
{
    public function setoresporsecretaria($id){

        //Obter a secretaria por id
        $secretaria = Secretaria::find($id);

        return $secretaria->setores->toArray();

    }
}
