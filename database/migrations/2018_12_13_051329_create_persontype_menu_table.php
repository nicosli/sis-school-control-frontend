<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersontypeMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('persontype_menu', function(Blueprint $table)
		{
			$table->integer('menu');
			$table->integer('persontype')->index('fk_pmenupersontype');
			$table->primary(['menu','persontype']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('persontype_menu');
	}

}
