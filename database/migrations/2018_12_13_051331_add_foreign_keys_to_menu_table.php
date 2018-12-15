<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('menu', function(Blueprint $table)
		{
			$table->foreign('submenu_parent', 'fk_submenu')->references('id')->on('menu')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('menu', function(Blueprint $table)
		{
			$table->dropForeign('fk_submenu');
		});
	}

}
