<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPersonResourceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('person_resource', function(Blueprint $table)
		{
			$table->foreign('resources_id', 'fk_person_resource')->references('id')->on('resource')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('person_id', 'fk_resource_person')->references('id')->on('person')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('person_resource', function(Blueprint $table)
		{
			$table->dropForeign('fk_person_resource');
			$table->dropForeign('fk_resource_person');
		});
	}

}
