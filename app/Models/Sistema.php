<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
     
	protected $fillable =[
		'nome',
		'descricao',
		'ativo'
	];

	public function roles()
 	{
		return $this->hasMany('App\Models\Role');
 	}
}
