<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

//use App\helpers\geral;
use App\Models\Funcionario;


class NovaSenha extends Mailable
{
    use Queueable, SerializesModels;

    public $funcionario;
    public $senha;
 
    public function __construct(Funcionario $funcionario, $senha)
    {
        $this->funcionario  = $funcionario;
        $this->senha = $senha;
    }
    
    
    public function build()
    {
        return $this->markdown('emails.nova_senha')
                    ->subject("Alteração de Senha")
                    ->with(['funcionario' => $this->funcionario, 'senha' => $this->senha]);
    }
}
