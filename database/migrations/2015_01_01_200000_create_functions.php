<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            DROP FUNCTION IF EXISTS sisseg.consulta_role;
            CREATE FUNCTION sisseg.`consulta_role`(fun_id int, sis_nome VARCHAR(255), rol_nome VARCHAR(255) ) RETURNS tinyint(1)
            BEGIN
            
            declare v_fun_id int(10) unsigned;
            declare v_sis_id int(10) unsigned;
            declare v_rol_id int(10) unsigned;
            
            declare v_sis_nome VARCHAR(255);
            declare v_rol_nome VARCHAR(255);
            
            declare existe int(10) unsigned;
            
            select id into v_sis_id from sistemas where nome = sis_nome;
            select id into v_rol_id from roles where nome = rol_nome and sistema_id = v_sis_id;
            
            select count(id) into existe
                            from funcionario_role 
                            where funcionario_id = fun_id
                            and role_id = v_rol_id;
                
                RETURN existe;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION IF EXISTS sisseg.consulta_role;');
    }
}
