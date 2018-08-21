<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Secretaria;

class CargoController extends Controller
{
    public function cargosporsecretaria($id){

        //Obter a secretaria por id
        $secretaria = Secretaria::find($id);
   
        return $secretaria->cargos->toArray();

    }
}
