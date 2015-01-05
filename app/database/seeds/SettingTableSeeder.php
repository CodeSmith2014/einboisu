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
				'company_name'=>'Billing Company',
				'reg_no'=>'',
				'office_no'=>'',
				'web_addr'=>'',
				'address'=>'',
				'invoice_prefix'=>'ICS',
				'year_prefix'=>'0',
				'month_prefix'=>'0',
				'left_pad'=>'4',
				)
			));
	}
}