<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPaymentDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('payment_detail', function(Blueprint $table)
		{
			$table->foreign('payment_id', 'fk_payment_detail')->references('id')->on('payment')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('payment_detail', function(Blueprint $table)
		{
			$table->dropForeign('fk_payment_detail');
		});
	}

}
