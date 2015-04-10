<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('maintenances', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('client_id')->unsigned()->unique();
			$table->integer('hours_purchased');
			$table->integer('hours_spent');
			$table->integer('hours_remaining');
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
		Schema::table('maintenances', function(Blueprint $table)
		{
			Schema::dropIfExists('maintenances');
		});
	}

}
