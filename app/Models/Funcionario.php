<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
#use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\UserResolver;
use Illuminate\Auth\Passwords\CanResetPassword;
use App\Notifications\enviaEmaildeDefinicaodeSenha;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
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
        'email'

    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relacionamentos

    public function setor()
    {
    	return $this->belongsTo('App\Models\Setor');
    }

    public function user()
    {
    	return $this->hasOne('App\Models\User');
    }

    public function comentarios()
    {
        return $this->hasMany('App\Models\Comentario');
    }
    
    public function movimentos()
    {
        return $this->hasMany('App\Models\Movimento');
    }        

    public function cargo()
    {
        return $this->belongsTo('App\Models\Cargo','cargo_id');
    }

    public function sys_logs()
    {
        return $this->hasMany('App\Models\Sys_log');
    }        

    public function roles()
    {
      return $this->belongsToMany('App\Models\Role');
    }

    public function atribuicoes()
    {
      return $this->belongsToMany('App\Models\Atribuicao', 'atribuicao_funcionario');
    }
   
    public function relatorios_semsop()
    {
    	return $this->belongsToMany('App\Models\Semsop_relatorio', 'semsop_funcionarios_relatorios')->withPivot('relator')->withTimestamps();
    }

    public function relatorios_semus()
    {
        return $this->hasMany('App\Models\Semus_relatorio');

    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

}
