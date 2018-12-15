<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonResourceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('person_resource', function(Blueprint $table)
		{
			$table->bigInteger('id')->primary();
			$table->bigInteger('resources_id')->index('fk_person_resource');
			$table->integer('person_id')->index('fk_resource_person');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('person_resource');
	}

}
