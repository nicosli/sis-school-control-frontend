<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTeacherSubjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('teacher_subject', function(Blueprint $table)
		{
			$table->foreign('subject_id', 'fk_person_subject')->references('id')->on('subject')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('teacher', 'fk_subject_person')->references('id')->on('person')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('teacher_subject', function(Blueprint $table)
		{
			$table->dropForeign('fk_person_subject');
			$table->dropForeign('fk_subject_person');
		});
	}

}
