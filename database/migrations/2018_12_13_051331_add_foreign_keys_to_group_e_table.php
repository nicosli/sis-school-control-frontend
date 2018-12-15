<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGroupETable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('group_e', function(Blueprint $table)
		{
			$table->foreign('classroom_id', 'fk_group_classroom')->references('id')->on('classroom')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('grade_id', 'fk_group_grade')->references('id')->on('grade')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('group_e', function(Blueprint $table)
		{
			$table->dropForeign('fk_group_classroom');
			$table->dropForeign('fk_group_grade');
		});
	}

}
