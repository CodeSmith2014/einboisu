<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('UserTableSeeder');
		$this->call('ClientTableSeeder');
		$this->call('ContactTableSeeder');
		$this->call('ClientContactTableSeeder');
	}

}