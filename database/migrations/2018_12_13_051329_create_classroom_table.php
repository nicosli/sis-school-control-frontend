<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassroomTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('classroom', function(Blueprint $table)
		{
			$table->bigInteger('id')->primary();
			$table->string('description', 155)->nullable();
			$table->integer('maxvalue');
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
		Schema::drop('classroom');
	}

}
