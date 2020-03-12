<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->increments('id');

            //------------------------FOREIGN--------------------------------
            $table->integer('secretaria_id')->unsigned()->nullable();
            //---------------------------------------------------------------

            $table->boolean('ativo')                ->default(1);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->mediumText('avatar')->nullable();
            $table->rememberToken();

            $table->string('nome');
            $table->char('cpf',14)                          ->nullable();
            $table->string('matricula', 12)                 ->nullable();
            $table->mediumtext('foto')                      ->nullable();

            $table->boolean('motorista')                ->default(0);
            $table->string('celular',10)                ->nullable();
            $table->char('cnh',11)                      ->nullable();
            $table->enum('categoria_cnh',['A','B','C','D','E','AB','AC','AD','AE'])->nullable();

            $table->date('validade_cnh',11)             ->nullable();

            $table->enum('tipo',['Efetivo','Comissionado','Externo','Sistema'])->default('Efetivo');



            $table->string('email_particular',255)                          ->nullable();
            $table->date('dt_nascimento')                                   ->nullable();
            $table->char('naturalidade',30)                                 ->nullable();
            $table->enum('sexo',['F', 'M'])                                 ->nullable();
            $table->char('etnia',10)                                        ->nullable();

            $table->enum('estado_civil',['Solteiro','Casado','Viúvo',
                                        'Separado judicialmente',
                                        'Divorciado'])                       ->nullable();
            $table->string('nome_conjuge',100)                              ->nullable();

            $table->string('nome_pai',100)                                  ->nullable();
            $table->string('nome_mae',100)                                  ->nullable();


            $table->char('cep',10)                                          ->nullable();
            $table->string('municipio',30)                                  ->nullable();
            $table->string('bairro',30)                                     ->nullable();
			$table->string('logradouro',100);
			$table->string('numero',10)                                     ->nullable();
			$table->string('complemento',100)                               ->nullable();
			$table->string('ponto_referencia',100)                          ->nullable();
            $table->string('tel_res',15)                                    ->nullable();
            $table->string('tel_recado',15)                                 ->nullable();
            $table->string('nome_recado',100)                               ->nullable();


            $table->string('identidade',20)                                 ->nullable();
            $table->string('org_exp_idt',10)                                ->nullable();
            $table->string('uf_idt',2)                                      ->nullable();
            $table->date('dt_exp_idt')                                      ->nullable();

            $table->string('pasep',11)                                      ->nullable();

            $table->string('ts_rh',3)                                       ->nullable();
            $table->string('titulo_eleitor',12)                             ->nullable();
            $table->string('zona_eleitoral',5)                              ->nullable();
            $table->string('secao_eleitoral',5)                             ->nullable();

            $table->string('c_reservista',10)                               ->nullable();
            $table->string('ano_c_reservista',4)                            ->nullable();
            $table->string('dispensa_reservista',10)                        ->nullable();
            $table->string('motivo_dispensa_reservista',10)                 ->nullable();
            $table->string('ano_dispensa_reservista',4)                     ->nullable();

            $table->date('admissao')                                        ->nullable();




            $table->timestamps();
        });

         Schema::table('funcionarios', function($table){
            $table->foreign('secretaria_id')->references('id')->on('secretarias')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('funcionarios');
    }
}
