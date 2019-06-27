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

class User extends Authenticatable 
{
    /* use HasApiTokens, Notifiable; */
    use  Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relacionamentos

    public function funcionario()
    {
        return $this->belongsTo('App\Models\Funcionario');
    }

}
