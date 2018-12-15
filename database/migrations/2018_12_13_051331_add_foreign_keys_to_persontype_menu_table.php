<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPersontypeMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('persontype_menu', function(Blueprint $table)
		{
			$table->foreign('menu', 'fk_pmenumenu')->references('id')->on('menu')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('persontype', 'fk_pmenupersontype')->references('id')->on('person_type')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('persontype_menu', function(Blueprint $table)
		{
			$table->dropForeign('fk_pmenumenu');
			$table->dropForeign('fk_pmenupersontype');
		});
	}

}
