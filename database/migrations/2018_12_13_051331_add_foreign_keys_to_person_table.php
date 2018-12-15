<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPersonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('person', function(Blueprint $table)
		{
			$table->foreign('type', 'fk_persontype')->references('id')->on('person_type')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('group_id', 'fk_person_group')->references('id')->on('group_e')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('person', function(Blueprint $table)
		{
			$table->dropForeign('fk_persontype');
			$table->dropForeign('fk_person_group');
		});
	}

}
