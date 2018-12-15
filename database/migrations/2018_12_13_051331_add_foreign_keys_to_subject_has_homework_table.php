<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSubjectHasHomeworkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('subject_has_homework', function(Blueprint $table)
		{
			$table->foreign('homework_id', 'fk_subject_has_homework_homework1')->references('id')->on('homework')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('subject_id', 'fk_subject_has_homework_subject1')->references('id')->on('subject')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('subject_has_homework', function(Blueprint $table)
		{
			$table->dropForeign('fk_subject_has_homework_homework1');
			$table->dropForeign('fk_subject_has_homework_subject1');
		});
	}

}
