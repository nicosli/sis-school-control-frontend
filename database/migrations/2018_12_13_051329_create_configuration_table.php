<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConfigurationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('configuration', function(Blueprint $table)
		{
			$table->bigInteger('id')->primary();
			$table->string('name')->nullable();
			$table->string('value')->nullable();
			$table->string('status', 45)->nullable()->default('A');
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
		Schema::drop('configuration');
	}

}
