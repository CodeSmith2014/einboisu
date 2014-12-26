<?php 

class ContactTableSeeder extends Seeder {

	public function run()
	{
		DB::table('contacts')->delete();
		DB::table('contacts')->insert(array(
			array(
				'name'=>'Tommie',
				'email'=>'admin@nethub.sg',
				'mobile_no'=>'+(65) 9008 0183',
				'notes'=>''
				),
			array(
				'name'=>'Paul Chio',
				'email'=>'paulchio@accesscorp.com.sg',
				'mobile_no'=>'+(65) 9622 4842',
				'notes'=>''
				),
			array(
				'name'=>'Jeffrey Lam',
				'email'=>'jeffrey.lam@aeigroup.com.sg',
				'mobile_no'=>'+(65) 9010 2900',
				'notes'=>''
				),
			array(
				'name'=>'Dilah',
				'email'=>'alloys@singnet.com.sg',
				'mobile_no'=>'+(65) 9057 5950',
				'notes'=>''
				)
			));
	}
}