<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchoolTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('school', function(Blueprint $table)
		{
			$table->bigInteger('id')->primary();
			$table->string('school_name', 155);
			$table->string('other_phone', 45)->nullable();
			$table->string('sep', 45)->nullable();
			$table->string('school_serial', 45)->nullable();
			$table->string('phone', 45)->nullable();
			$table->integer('address_id')->index('fk_school_address');
			$table->timestamps();
			$table->string('created_by', 50)->nullable()->default('eduApi');
			$table->string('updated_by', 50)->nullable()->default('eduApi');
			$table->softDeletes();
			$table->string('deleted_by', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('school');
	}

}
