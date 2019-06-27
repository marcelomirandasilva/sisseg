<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
#use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Role extends Model  //implements AuditableContract
{
	#use \OwenIt\Auditing\Auditable;

   // Fillables

    protected $fillable = [
    	'acesso',
     	
		  'nome',
		  'sistema_id'
    ];

    // Relacionamentos

  	public function funcionarios()
 	{
        return $this->belongsToMany('App\Models\Funcionario');
 	}
	  
	public function sistema()
 	{
		return $this->belongsTo('App\Models\Sistema');
 	}


}
