<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_detail', function(Blueprint $table)
		{
			$table->bigInteger('id')->primary();
			$table->string('code', 45)->nullable();
			$table->string('description', 100)->nullable();
			$table->bigInteger('payment_id')->index('fk_payment_detail');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payment_detail');
	}

}
