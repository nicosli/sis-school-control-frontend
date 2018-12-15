<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('address', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('line1', 250);
			$table->string('line2', 120)->nullable();
			$table->integer('type')->index('fk_address_type');
			$table->integer('person_id')->index('fk_addressperson');
			$table->boolean('is_primary');
			$table->integer('township')->index('fk_addresstownship');
			$table->string('created_by', 10);
			$table->timestamps();
			$table->string('updated_by', 10)->nullable();
			$table->string('deleted_by', 10)->nullable();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('address');
	}

}
