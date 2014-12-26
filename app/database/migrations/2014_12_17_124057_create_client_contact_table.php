<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('client_contact', function($table) {
			$table->integer('client_id')->unsigned();
			$table->foreign('client_id')->references('id')->on('clients')
			->onDelete('cascade')->onUpdate('cascade');
			$table->integer('contact_id')->unsigned();
			$table->foreign('contact_id')->references('id')->on('contacts')
			->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('client_contact', function(Blueprint $table)
		{
			Schema::dropIfExists("client_contact");
		});
	}

}
