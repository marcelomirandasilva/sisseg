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
            $table->string('email')->unique();
            $table->string('password');
            $table->mediumText('avatar')->nullable();
            $table->rememberToken();

            $table->string('nome');
            $table->char('cpf',14)                          ->nullable();
            $table->string('matricula', 12)                 ->nullable();
            $table->mediumtext('foto')                      ->nullable();

            $table->boolean('motorista')                ->default(0);
            $table->string('celular',10)                ->nullable();
            $table->char('cnh',11)                      ->nullable();
            $table->string('categoria_cnh',3)           ->nullable();
            $table->enum('categoria_cnh',['A','B','C','D','E','AB','AC','AD','AE'])->nullable();

            $table->date('validade_cnh',11)             ->nullable();

            $table->enum('tipo',['Efetivo','Comissionado','Externo','Sistema'])->default('Efetivo');

            //------------------------FOREIGN--------------------------------
            $table->integer('secretaria_id')->unsigned()->nullable();

            //---------------------------------------------------------------
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
