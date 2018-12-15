<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('address', function(Blueprint $table)
		{
			$table->foreign('person_id', 'fk_addressperson')->references('id')->on('person')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('township', 'fk_addresstownship')->references('id')->on('township')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('type', 'fk_address_type')->references('id')->on('type')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('address', function(Blueprint $table)
		{
			$table->dropForeign('fk_addressperson');
			$table->dropForeign('fk_addresstownship');
			$table->dropForeign('fk_address_type');
		});
	}

}
