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

            DB::table('funcionarios')->insert([    
                'nome'          => 'Marcelo Miranda',
                'email'         => 'marcelo.miranda@mesquita.rj.gov.br',
                'password'      =>  '$2y$10$IV5BxV2wXnW7yswbZPnbd.QJTqUYL2Zkwq972PQXCxOlXfIdIbGUC',
                'cpf'           => '075.857.927-60',
                'secretaria_id' => '14'
            ]);

    }
}
