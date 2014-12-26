<?php 

class ClientContactTableSeeder extends Seeder {

	public function run()
	{
		DB::table('client_contact')->delete();
		DB::table('client_contact')->insert(array(
			array(
				'client_id'=>'1',
				'contact_id'=>'1'),
			array(
				'client_id'=>'2',
				'contact_id'=>'2'),

			array(
				'client_id'=>'3',
				'contact_id'=>'3'),
			array(
				'client_id'=>'4',
				'contact_id'=>'4')
			)
		);
	}
}