<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMunicipalityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('municipality', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('description', 120);
			$table->integer('state_province')->index('fk_municipalitystate');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('municipality');
	}

}
