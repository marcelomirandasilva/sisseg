<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //usado na USERS
       /* DB::statement(" CREATE TYPE tp_status AS ENUM ('Ativo','Inativo') ");

        //usado na CARGOS
        DB::statement(" CREATE TYPE tp_tipo_cargos AS ENUM ('E','C') ");//E = Efetivo, C = Comissionado 

        //usado na ENDERECOS
        DB::statement(" CREATE TYPE tp_uf AS ENUM ('AC','AL','AM','AP','BA','CE','DF','ES','GO','MA','MG','MS','MT','PA','PB','PE','PI','PR','RJ','RN','RO','RR','RS','SC','SE','SP','TO') ");

        //usado na FUNCIONARIOS
        DB::statement(" CREATE TYPE tp_tipo_funcionario AS ENUM ('Efetivo','Comissionado','Externo','Sistema') ");

        //usado na SOLICITANTES
        DB::statement(" CREATE TYPE tp_sexo AS ENUM ('Feminino','Masculino','Outros') ");
        DB::statement(" CREATE TYPE tp_status_solicitante AS ENUM ('Criado','Ativo','Inativo') ");
        DB::statement(" CREATE TYPE tp_estado_civil AS ENUM ('Solteiro(a)','Casado(a)','Divorciado(a)','Viúvo(a)','Separado(a)','União estável') ");
        DB::statement(" CREATE TYPE tp_escolaridade AS ENUM ('Fundamental - Incompleto','Fundamental - Completo','Médio - Incompleto','Médio - Completo','Superior - Incompleto','Superior - Completo','Pós-graduação - Incompleto','Pós-graduação - Completo','Mestrado - Incompleto','Mestrado - Completo','Doutorado - Incompleto','Doutorado - Completo') ");

        //usado na TELEFONES
        DB::statement(" CREATE TYPE tp_telefone AS ENUM ('Fixo','Celular') ");*/

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
/*        DB::statement(" DROP TYPE tp_status ");
        DB::statement(" DROP TYPE tp_tipo_cargos "); 
        DB::statement(" DROP TYPE tp_uf "); 
        DB::statement(" DROP TYPE tp_tipo_funcionario "); 
        DB::statement(" DROP TYPE tp_sexo "); 
        DB::statement(" DROP TYPE tp_status_solicitante "); 
        DB::statement(" DROP TYPE tp_estado_civil "); 
        DB::statement(" DROP TYPE tp_escolaridade "); 
        DB::statement(" DROP TYPE tp_telefone "); 
*/    }
}
