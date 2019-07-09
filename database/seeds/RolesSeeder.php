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

 
			DB::table('roles')->insert(['nome' => 'DSV',                'sistema_id' => '1' ]);
			DB::table('roles')->insert(['nome' => 'GOVERNO',            'sistema_id' => '1' ]);
			DB::table('roles')->insert(['nome' => 'GERENTE_FROTA',      'sistema_id' => '1' ]);
			DB::table('roles')->insert(['nome' => 'RESP_ABASTECIMENTO', 'sistema_id' => '1' ]);
			DB::table('roles')->insert(['nome' => 'RESP_BDT',           'sistema_id' => '1' ]);
			DB::table('roles')->insert(['nome' => 'RESP_FROTA',         'sistema_id' => '1' ]);
			DB::table('roles')->insert(['nome' => 'SECRETARIO',         'sistema_id' => '1' ]);
			DB::table('roles')->insert(['nome' => 'FUNCIONARIO',        'sistema_id' => '1' ]);
			DB::table('roles')->insert(['nome' => 'FISCAL',             'sistema_id' => '1' ]);
			DB::table('roles')->insert(['nome' => 'MOTORISTA',          'sistema_id' => '1' ]);
			DB::table('roles')->insert(['nome' => 'RESP_AGENDAMENTO',   'sistema_id' => '1' ]);
			DB::table('roles')->insert(['nome' => 'DSV',                'sistema_id' => '2' ]);
			DB::table('roles')->insert(['nome' => 'ADMINISTRADOR',      'sistema_id' => '3' ]);
			DB::table('roles')->insert(['nome' => 'CON_ACE',            'sistema_id' => '4' ]);
			DB::table('roles')->insert(['nome' => 'LOGIN',              'sistema_id' => '5' ]);
			DB::table('roles')->insert(['nome' => 'LOGIN',              'sistema_id' => '8' ]);
			DB::table('roles')->insert(['nome' => 'PROCURADOR',         'sistema_id' => '8' ]);


		}
}
