<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('person_type', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('description', 120);
			$table->string('code', 55);
			$table->integer('role')->index('fk_persontyperole');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('person_type');
	}

}
