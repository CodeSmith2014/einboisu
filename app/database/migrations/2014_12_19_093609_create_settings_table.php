<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('logo');
			$table->string('date_format')->default('d/m/Y');
			$table->string('timezone')->default('Asia/Singapore');
			$table->string('paper_size')->default('a4');
			$table->string('paper_orientation')->default('portrait');
			$table->string('company_name');
			$table->string('reg_no');
			$table->string('office_no');
			$table->string('web_addr');
			$table->string('address');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('settings', function(Blueprint $table)
		{
			Schema::dropIfExists("settings");
		});
	}

}
