<?php 

class ClientTableSeeder extends Seeder {

	public function run()
	{
		DB::table('clients')->delete();
		DB::table('clients')->insert(array(
			array(
				'name'=>'8M Alarm System Pte. Ltd.',
				'reg_no'=>'199105371M',
				'address'=>'1002 Toa Payoh Industrial Park, #04-1433',
				'country'=>'Singapore',
				'city'=>'Singapore',
				'postal_code'=>'319074',
				'office_no'=>'',
				'fax_no'=>''),
			
			array(
				'name'=>'Accesscorp Pte. Ltd.',
				'reg_no'=>'200602315D',
				'address'=>'47 Hill Street, #07-06, SCCCI Building',
				'country'=>'Singapore',
				'city'=>'Singapore',
				'postal_code'=>'179365',
				'office_no'=>'',
				'fax_no'=>''),

			array(
				'name'=>'AEI Group Pte. Ltd.',
				'reg_no'=>'200918336G',
				'address'=>'629 Aljunied Road, #06-06 Cititech Industrial Building',
				'country'=>'Singapore',
				'city'=>'Singapore',
				'postal_code'=>'389838',
				'office_no'=>'',
				'fax_no'=>''),

			array(
				'name'=>'Alloys International Private Limited',
				'reg_no'=>'197401376C',
				'address'=>'32 Lok Yang Way',
				'country'=>'Singapore',
				'city'=>'Singapore',
				'postal_code'=>'628639',
				'office_no'=>'+(65) 6265 4088',
				'fax_no'=>'')
			));
}
}