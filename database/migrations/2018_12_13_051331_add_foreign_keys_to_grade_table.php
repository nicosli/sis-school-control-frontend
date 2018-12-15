<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGradeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('grade', function(Blueprint $table)
		{
			$table->foreign('school_year_id', 'fk_grade_schoolyear')->references('id')->on('school_year')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('grade', function(Blueprint $table)
		{
			$table->dropForeign('fk_grade_schoolyear');
		});
	}

}
