<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMunicipalityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('municipality', function(Blueprint $table)
		{
			$table->foreign('state_province', 'fk_municipalitystate')->references('id')->on('state_province')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('municipality', function(Blueprint $table)
		{
			$table->dropForeign('fk_municipalitystate');
		});
	}

}
