<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStateProvinceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('state_province', function(Blueprint $table)
		{
			$table->foreign('country', 'fk_statecountry')->references('id')->on('country')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('state_province', function(Blueprint $table)
		{
			$table->dropForeign('fk_statecountry');
		});
	}

}
