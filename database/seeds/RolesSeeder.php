<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


      DB::table('roles')->insert(['nome' => 'Moderador',                            'peso' => '10'  ]);
      DB::table('roles')->insert(['nome' => 'SAC',                                  'peso' => '20'  ]);
      DB::table('roles')->insert(['nome' => 'Funcionário',                          'peso' => '30'  ]);
      DB::table('roles')->insert(['nome' => 'Funcionário Responsável Setor',        'peso' => '40'  ]);
      DB::table('roles')->insert(['nome' => 'Funcionário Responsável Secretaria',   'peso' => '50'  ]);
      DB::table('roles')->insert(['nome' => 'Subsecretário',                        'peso' => '55'  ]);
      DB::table('roles')->insert(['nome' => 'Secretário',                           'peso' => '60'  ]);
      DB::table('roles')->insert(['nome' => 'Ouvidor',                              'peso' => '70'  ]);
      DB::table('roles')->insert(['nome' => 'Prefeito',                             'peso' => '80'  ]);
      DB::table('roles')->insert(['nome' => 'TI',                                   'peso' => '90'  ]);
    	DB::table('roles')->insert(['nome' => 'DSV',					                        'peso' =>	'100'	]);



    }
}
