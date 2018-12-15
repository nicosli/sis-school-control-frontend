<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToScheduleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('schedule', function(Blueprint $table)
		{
			$table->foreign('group_id', 'fk_schedule_group')->references('id')->on('group_e')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('teacher', 'fk_schedule_person')->references('id')->on('person')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('schedule_week_id', 'fk_schedule_schedule_week')->references('id')->on('schedule_week')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('subject_id', 'fk_schedule_subject')->references('id')->on('subject')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('schedule', function(Blueprint $table)
		{
			$table->dropForeign('fk_schedule_group');
			$table->dropForeign('fk_schedule_person');
			$table->dropForeign('fk_schedule_schedule_week');
			$table->dropForeign('fk_schedule_subject');
		});
	}

}
