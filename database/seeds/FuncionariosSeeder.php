<?php

use Illuminate\Database\Seeder;
use App\Models\Funcionario;
use App\Models\Secretaria;

class FuncionariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 50; $i++) {

            factory(App\Models\Funcionario::class)->create();
        }

    }
}
