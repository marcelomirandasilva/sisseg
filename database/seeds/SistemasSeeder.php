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
		

	  	DB::table('sistemas')->insert(['nome' => 'SCP - Proc. Geral ',                               'ativo' => '1' ]);
	  	DB::table('sistemas')->insert(['nome' => 'SCP - Câm. de Conciliação e Arbitragem',           'ativo' => '1' ]);
	  	DB::table('sistemas')->insert(['nome' => 'SCP - Proc. da Dívida Ativa',                      'ativo' => '1' ]);
	  	DB::table('sistemas')->insert(['nome' => 'SCP - Proc. Tributária Administrativa',            'ativo' => '1' ]);
	  	DB::table('sistemas')->insert(['nome' => 'SCP - Proc. Tributária Judicial',                  'ativo' => '1' ]);
	  	DB::table('sistemas')->insert(['nome' => 'SCP - Proc. de Saúde Administrativa',              'ativo' => '1' ]);
	  	DB::table('sistemas')->insert(['nome' => 'SCP - Proc. de Saúde Judicial',                    'ativo' => '1' ]);
	  	DB::table('sistemas')->insert(['nome' => 'SCP - Proc. Trabalhista',                          'ativo' => '1' ]);
	  	DB::table('sistemas')->insert(['nome' => 'SCP - Proc. do Contencioso Judicial e Residual',   'ativo' => '1' ]);
	  	DB::table('sistemas')->insert(['nome' => 'SCP - Proc. Previdenciária',                       'ativo' => '1' ]);
	  	DB::table('sistemas')->insert(['nome' => 'SCP - Proc. Administrativa e Servidores Públicos', 'ativo' => '1' ]);
	  	DB::table('sistemas')->insert(['nome' => 'SCP - Proc. de Licitações e Contratos',            'ativo' => '1' ]);




	 }
}
