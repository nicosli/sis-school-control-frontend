<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupETable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_e', function(Blueprint $table)
		{
			$table->bigInteger('id')->primary();
			$table->integer('capacity')->nullable();
			$table->string('description', 150)->nullable();
			$table->bigInteger('classroom_id')->index('fk_group_classroom');
			$table->bigInteger('grade_id')->index('fk_group_grade');
			$table->string('status', 45)->nullable()->default('A');
			$table->timestamps();
			$table->string('created_by', 50)->nullable()->default('eduApi');
			$table->softDeletes();
			$table->string('deleted_by', 50)->nullable();
			$table->string('updated_by', 50)->nullable()->default('eduApi');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('group_e');
	}

}
