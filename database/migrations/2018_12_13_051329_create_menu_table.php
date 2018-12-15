<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menu', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('description', 55);
			$table->string('icon', 55)->nullable();
			$table->string('path', 120)->nullable();
			$table->integer('submenu_parent')->nullable()->index('fk_submenu');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menu');
	}

}
