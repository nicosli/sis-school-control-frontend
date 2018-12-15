<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('person', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('first_name', 120);
			$table->string('middle_name', 120)->nullable();
			$table->string('last_name', 120);
			$table->string('second_last_name', 120)->nullable();
			$table->date('birthdate');
			$table->string('gender', 6);
			$table->integer('type')->index('fk_persontype');
			$table->string('curp', 250)->nullable();
			$table->string('phone', 30)->nullable();
			$table->string('cellphone', 30)->nullable();
			$table->string('email', 50);
			$table->string('password', 250);
			$table->string('networkid', 100);
			$table->string('rfc', 250)->nullable();
			$table->string('citizenship', 120)->nullable();
			$table->string('occupation', 120)->nullable();
			$table->string('image_path', 250)->nullable();
			$table->string('maritalstatus', 100)->nullable();
			$table->bigInteger('group_id')->nullable()->index('fk_person_group');
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
		Schema::drop('person');
	}

}
