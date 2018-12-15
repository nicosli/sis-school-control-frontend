<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScheduleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schedule', function(Blueprint $table)
		{
			$table->bigInteger('id')->primary();
			$table->bigInteger('group_id')->index('fk_schedule_group');
			$table->integer('teacher')->index('fk_schedule_person');
			$table->bigInteger('schedule_week_id')->index('fk_schedule_schedule_week');
			$table->bigInteger('subject_id')->index('fk_schedule_subject');
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
		Schema::drop('schedule');
	}

}
