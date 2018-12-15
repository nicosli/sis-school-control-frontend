<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchoolYearTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('school_year', function(Blueprint $table)
		{
			$table->bigInteger('id')->primary();
			$table->string('description', 150)->nullable();
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
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
		Schema::drop('school_year');
	}

}
