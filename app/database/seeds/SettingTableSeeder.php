<?php 

class SettingTableSeeder extends Seeder {

	public function run()
	{
		DB::table('settings')->delete();
		DB::table('settings')->insert(array(
			array(
				'logo'=>'',
				'date_format'=>'',
				'timezone'=>'',
				'paper_size'=>'Letter',
				'paper_orientation'=>'',
				'company_name'=>'Billing Company',
				'reg_no'=>'',
				'office_no'=>'',
				'web_addr'=>'',
				'address'=>'',
				)
			));
	}
}