<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnsitesupportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('onsitesupports', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('maintenance_id')->unsigned();
			$table->string('hours_spent');
			$table->date('onsite_date')->default('0000-00-00');
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
		Schema::table('onsitesupports', function(Blueprint $table)
		{
			Schema::dropIfExists('onsitesupports');
		});
	}

}