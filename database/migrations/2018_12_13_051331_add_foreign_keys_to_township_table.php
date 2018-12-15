<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTownshipTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('township', function(Blueprint $table)
		{
			$table->foreign('city', 'fk_townshipcity')->references('id')->on('city')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('municipality', 'fk_townshipmunicipality')->references('id')->on('municipality')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('township', function(Blueprint $table)
		{
			$table->dropForeign('fk_townshipcity');
			$table->dropForeign('fk_townshipmunicipality');
		});
	}

}
