<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAssessmentDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('assessment_detail', function(Blueprint $table)
		{
			$table->foreign('assessments_id', 'fk_assessment_assessment_detail')->references('id')->on('assessment')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('assessment_detail', function(Blueprint $table)
		{
			$table->dropForeign('fk_assessment_assessment_detail');
		});
	}

}
