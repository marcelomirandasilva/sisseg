<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class SecretariasSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$secretariaID =  DB::table('secretarias')->insertGetId(['nome'=>'Controladoria Geral do Município'  ,'secretario' => 'Nicola Fabiano Palmier' ,'sigla' => 'CGM']);
		$secretariaID = DB::table('secretarias')->insertGetId(['nome'=>'Procuradoria Geral do Município' ,'secretario' => 'Gilmar Brunizi' ,'sigla' => 'PGM']); 
		$secretariaID = DB::table('secretarias')->insertGetId(['nome'=>'Secretaria Municipal de Assistência Social','secretario' => 'Luiza Cristina Quaresma de Oliveira ','sigla' => 'SEMAS']);
		$secretariaID = DB::table('secretarias')->insertGetId(['nome'=>'Secretaria Municipal de Educação' ,'secretario' => 'Thaís dos Santos de Lima'  ,'sigla' => 'SEMED']);
		$secretariaID = DB::table('secretarias')->insertGetId(['nome'=>'Secretaria Municipal de Esporte, Cultura, Lazer e Turismo' ,'secretario' => 'Luis Kleber Rodrigues Farias'  ,'sigla' => 'SEMCELT']);
		$secretariaID = DB::table('secretarias')->insertGetId(['nome'=>'Secretaria Municipal de Meio Ambiente e Urbanismo','secretario' => 'Luney Martins de Almeida','sigla' => 'SEMMURB']);
		$secretariaID = DB::table('secretarias')->insertGetId(['nome'=>'Secretaria Municipal de Obras, Serviços Públicos e Defesa Civil','secretario' => 'César Marian','sigla' => 'SEMOSPDEC' ]); //11
		$secretariaID = DB::table('secretarias')->insertGetId(['nome'=>'Secretaria Municipal de Saúde','secretario' => 'Emerson Trindade da Costa','sigla' => 'SEMUS'     ]); //12																										
		$secretariaID = DB::table('secretarias')->insertGetId(['nome'=>'Secretaria Municipal de Segurança, Ordem Pública e Cidadania','secretario' => 'Sérgio Luis Mendes Afonso','sigla' => 'SEMSOP'    ]); //13										
		$secretariaID = DB::table('secretarias')->insertGetId(['nome'=>'Secretaria Municipal de Trabalho, Desenvolvimento Econômico e Agricultura' ,'secretario' => 'Janyr Fernandes de Menezes' ,'sigla' => 'SETRADE'   ]); 
		$secretariaID = DB::table('secretarias')->insertGetId(['nome'=>'Secretaria Municipal de Transporte e Trânsito' ,'secretario' => 'Fernando Gonzalez dos Santos' ,'sigla' => 'SETRANS'   ]); //15										
		$secretariaID = DB::table('secretarias')->insertGetId(['nome'=>'Subsecretaria Municipal de Administração','secretario' => 'Alexandre Alves Ferraz' ,'sigla' => 'SEMGAP'    ]); //17
		$secretariaID = DB::table('secretarias')->insertGetId(['nome'=>'Subsecretaria de Defesa Cívil' ,'secretario' => 'Ronaldo Vilazio','sigla' => 'DEFCIV'    ]); //19
		$secretariaID =  DB::table('secretarias')->insertGetId(['nome'=>'Subsecretaria Municipal de Tecnologia da Informação' ,'secretario' => 'Ronald Henrique Ferreira de Almeida'  ,'sigla' => 'STI']); //20
	}

}

