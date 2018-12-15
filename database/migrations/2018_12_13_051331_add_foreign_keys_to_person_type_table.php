<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPersonTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('person_type', function(Blueprint $table)
		{
			$table->foreign('role', 'fk_persontyperole')->references('id')->on('role')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('person_type', function(Blueprint $table)
		{
			$table->dropForeign('fk_persontyperole');
		});
	}

}
