<?php 

class SettingTableSeeder extends Seeder {

	public function run()
	{
		DB::table('settings')->delete();
		DB::table('settings')->insert(array(
			array(
				'logo'=>'ad51fb98335447cfbdc8c3a4c.png',
				'date_format'=>'',
				'timezone'=>'',
				'paper_size'=>'Letter',
				'company_name'=>'Company Name',
				'reg_no'=>'123',
				'office_no'=>'123',
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