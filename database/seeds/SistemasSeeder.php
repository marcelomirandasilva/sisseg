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
		
	  	DB::table('sistemas')->insert(['nome' => 'SCP_CSPGM',  	'descricao' => 'Conselho Superior da Procuradoria-Geral do Município de Mesquita', 		'ativo' => '1' ]);
		DB::table('sistemas')->insert(['nome' => 'SCP_CMCA',  	'descricao' => 'Câmara Municipal de Conciliação e Arbitragem do Município de Mesquita', 'ativo' => '1' ]);
		DB::table('sistemas')->insert(['nome' => 'SCP_PDA',  	'descricao' => 'Procuradoria da Dívida Ativa', 											'ativo' => '1' ]);
		DB::table('sistemas')->insert(['nome' => 'SCP_PTA',  	'descricao' => 'Procuradoria Tributária Administrativa', 								'ativo' => '1' ]);
		DB::table('sistemas')->insert(['nome' => 'SCP_PTJ',  	'descricao' => 'Procuradoria Tributária Judicial', 										'ativo' => '1' ]);
		DB::table('sistemas')->insert(['nome' => 'SCP_PSA',  	'descricao' => 'Procuradoria de Saúde Administrativa', 									'ativo' => '1' ]);
		DB::table('sistemas')->insert(['nome' => 'SCP_PSJ',  	'descricao' => 'Procuradoria de Saúde Judicial', 										'ativo' => '1' ]);
		DB::table('sistemas')->insert(['nome' => 'SCP_PTRAB',  	'descricao' => 'Procuradoria Trabalhista', 												'ativo' => '1' ]);
		DB::table('sistemas')->insert(['nome' => 'SCP_PCJR',  	'descricao' => 'Procuradoria do Contencioso Judicial e Residual', 						'ativo' => '1' ]);
		DB::table('sistemas')->insert(['nome' => 'SCP_PPREV',  	'descricao' => 'Procuradoria Previdenciária', 											'ativo' => '1' ]);
		DB::table('sistemas')->insert(['nome' => 'SCP_PASP',  	'descricao' => 'Procuradoria Administrativa e Servidores Públicos', 					'ativo' => '1' ]);
		DB::table('sistemas')->insert(['nome' => 'SCP_PLC',  	'descricao' => 'Procuradoria de Licitações e Contratos', 								'ativo' => '1' ]);



	 }
}
