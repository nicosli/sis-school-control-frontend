<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGradeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grade', function(Blueprint $table)
		{
			$table->bigInteger('id')->primary();
			$table->string('description', 150)->nullable();
			$table->string('shift', 45)->nullable();
			$table->bigInteger('school_year_id')->nullable()->index('fk_grade_schoolyear');
			$table->string('status', 45)->nullable()->default('A');
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
		Schema::drop('grade');
	}

}
