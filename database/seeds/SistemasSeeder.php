<?php

use Illuminate\Database\Seeder;

class SistemasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


      DB::table('sistemas')->insert(['nome' => 'SGF',          'ativo' => '1'  ]);
      DB::table('sistemas')->insert(['nome' => 'HABITACAO',    'ativo' => '1'  ]);
      DB::table('sistemas')->insert(['nome' => 'TRABALHO',     'ativo' => '1'  ]);
      DB::table('sistemas')->insert(['nome' => 'CONSULTA',     'ativo' => '1'  ]);
      DB::table('sistemas')->insert(['nome' => 'SISDOCA',      'ativo' => '1'  ]);



    }
}
