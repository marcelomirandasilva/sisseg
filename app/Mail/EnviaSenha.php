<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

//use App\helpers\geral;
use App\Models\Funcionario;


class EnviaSenha extends Mailable
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
        return $this->markdown('emails.senha')
                    ->subject("Cadastro de Novo Funcionário")
                    ->with(['funcionario' => $this->funcionario, 'senha' => $this->senha]);
    }
}
