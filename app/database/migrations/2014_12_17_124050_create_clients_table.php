<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('clients', function(Blueprint $table)
		{   
			$table->increments('id');
			$table->string('name');			
			$table->string('reg_no',20)->nullable();
			$table->string('address');
			$table->string('country');
			$table->string('city');
			$table->string('postal_code');
			$table->string('office_no',20)->nullable();
			$table->string('fax_no',20)->nullable();
			$table->text('notes')->nullable();
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
		//
		Schema::table('clients', function(Blueprint $table)
		{
			Schema::dropIfExists("clients");
		});
	}

}
