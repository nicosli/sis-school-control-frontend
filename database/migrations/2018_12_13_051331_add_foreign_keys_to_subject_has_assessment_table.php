<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSubjectHasAssessmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('subject_has_assessment', function(Blueprint $table)
		{
			$table->foreign('assessment_id', 'fk_subject_has_assessment_assessment1')->references('id')->on('assessment')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('subject_id', 'fk_subject_has_assessment_subject1')->references('id')->on('subject')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('subject_has_assessment', function(Blueprint $table)
		{
			$table->dropForeign('fk_subject_has_assessment_assessment1');
			$table->dropForeign('fk_subject_has_assessment_subject1');
		});
	}

}
