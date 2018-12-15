<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubjectHasAssessmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subject_has_assessment', function(Blueprint $table)
		{
			$table->bigInteger('subject_id')->index('fk_subject_has_assessment_subject1_idx');
			$table->bigInteger('assessment_id')->index('fk_subject_has_assessment_assessment1_idx');
			$table->primary(['subject_id','assessment_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subject_has_assessment');
	}

}
