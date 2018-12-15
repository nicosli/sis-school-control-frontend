<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStateProvinceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('state_province', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('code', 55);
			$table->string('name', 120);
			$table->integer('country')->index('fk_statecountry');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('state_province');
	}

}
