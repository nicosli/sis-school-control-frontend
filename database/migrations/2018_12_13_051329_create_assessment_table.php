<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssessmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assessment', function(Blueprint $table)
		{
			$table->bigInteger('id')->primary();
			$table->string('comments')->nullable();
			$table->float('extra', 10, 0);
			$table->float('score', 10, 0);
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
		Schema::drop('assessment');
	}

}
