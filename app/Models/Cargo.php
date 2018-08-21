<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Cargo extends Model
{
    

    protected $table = "cargos";


    protected $fillable = [
    	'nome',
		'tipo',
		'secretaria_id'
    ];

    /////////////////////// Relacionamentos

    public function funcionarios()
    {
        return $this->hasMany('App\Models\Funcionario');
    }
    
    public function secretaria()
    {
    	return $this->belongsTo('App\Models\Secretaria','secretaria_id');
    }
}



