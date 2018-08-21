<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Secretaria extends Model
{

    protected $table = "secretarias";

    protected $fillable =[

    	'nome',
        'secretario',
        'sigla',
        'email',
        'telefone',
        'inicio_atendimento',
        'termino_atendimento',
        'operante',
    ];



    public function endereco()
	{
		return $this->hasOne('App\Models\Endereco');
	}

    public function setores()
    {
        return $this->hasMany('App\Models\Setor');
    }

     public function telefones()
    {
        return $this->hasMany('App\Models\Telefone');
    }

    public function cargos()
    {
        return $this->hasMany('App\Models\Cargo');
    }    
}
