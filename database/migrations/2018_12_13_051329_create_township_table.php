<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTownshipTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('township', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('description', 120);
			$table->string('state_zipcode', 55)->nullable();
			$table->string('type', 55)->nullable();
			$table->string('postal_code', 55)->nullable();
			$table->string('zone', 55)->nullable();
			$table->integer('city')->index('fk_townshipcity');
			$table->integer('municipality')->index('fk_townshipmunicipality');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('township');
	}

}
