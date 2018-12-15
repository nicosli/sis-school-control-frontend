<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubjectHasHomeworkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subject_has_homework', function(Blueprint $table)
		{
			$table->bigInteger('subject_id')->index('fk_subject_has_homework_subject1_idx');
			$table->bigInteger('homework_id')->index('fk_subject_has_homework_homework1_idx');
			$table->primary(['subject_id','homework_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subject_has_homework');
	}

}
