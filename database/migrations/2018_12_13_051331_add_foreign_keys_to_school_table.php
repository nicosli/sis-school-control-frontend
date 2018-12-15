<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSchoolTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('school', function(Blueprint $table)
		{
			$table->foreign('address_id', 'fk_school_address')->references('id')->on('address')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('school', function(Blueprint $table)
		{
			$table->dropForeign('fk_school_address');
		});
	}

}
