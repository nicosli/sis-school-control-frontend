<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScheduleWeekTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schedule_week', function(Blueprint $table)
		{
			$table->bigInteger('id')->primary();
			$table->string('day_of_week', 45)->nullable();
			$table->time('start_time')->nullable();
			$table->time('end_time')->nullable();
			$table->string('month_e', 45)->nullable();
			$table->integer('week_of_month')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('schedule_week');
	}

}
