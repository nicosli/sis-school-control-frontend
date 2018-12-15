<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSubjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('subject', function(Blueprint $table)
		{
			$table->foreign('grade_id', 'fk_subject_grade')->references('id')->on('grade')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('subject', function(Blueprint $table)
		{
			$table->dropForeign('fk_subject_grade');
		});
	}

}
