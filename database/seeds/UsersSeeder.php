<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			
			DB::table('users')->insert([	'name' 		=> 'Marcelo Miranda',
													'email' 		=> 'marcelo.miranda@mesquita.rj.gov.br',
													'password'  =>  '$2y$10$IV5BxV2wXnW7yswbZPnbd.QJTqUYL2Zkwq972PQXCxOlXfIdIbGUC'
												]);
			


		}
}
