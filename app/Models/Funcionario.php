<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
#use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\UserResolver;
use Illuminate\Auth\Passwords\CanResetPassword;
use App\Notifications\enviaEmaildeDefinicaodeSenha;
use Illuminate\Foundation\Auth\User as Authenticatable;
/* use Laravel\Passport\HasApiTokens; */
use Illuminate\Database\Eloquent\Model;
#use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Funcionario extends Authenticatable 
{
    #use \OwenIt\Auditing\Auditable;

    // Fillables

    protected $fillable = [
    	
        'nome',
        'cpf',
    	'matricula',
    	'foto',
        'setor_id',
        'role_id',
        'cargo_id',
        'tipo',
        'password',
        'email',
        'secretaria_id',
        'status',
        'motorista',
        'celular',
        'cnh',
        'categoria_cnh',
        'validade_cnh'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relacionamentos


    public function user()
    {
    	return $this->hasOne('App\Models\User');
    }

    public function sys_logs()
    {
        return $this->hasMany('App\Models\Sys_log');
    }        

    public function roles()
    {
      return $this->belongsToMany('App\Models\Role');
    }

    public function secretaria()
    {
      return $this->belongsTo('App\Models\Secretaria');
    }


}
