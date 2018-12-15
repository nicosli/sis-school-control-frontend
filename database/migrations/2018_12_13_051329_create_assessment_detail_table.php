<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssessmentDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assessment_detail', function(Blueprint $table)
		{
			$table->bigInteger('id')->primary();
			$table->float('additional', 10, 0);
			$table->float('points', 10, 0);
			$table->float('score', 10, 0);
			$table->bigInteger('assessments_id')->index('fk_assessment_assessment_detail');
			$table->string('status', 45)->nullable();
			$table->timestamps();
			$table->string('created_by', 50)->nullable()->default('eduApi');
			$table->string('updated_by', 50)->nullable()->default('eduApi');
			$table->softDeletes();
			$table->string('deleted_by', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('assessment_detail');
	}

}
