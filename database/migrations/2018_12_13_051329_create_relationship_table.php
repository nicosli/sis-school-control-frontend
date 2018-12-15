<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRelationshipTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('relationship', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->integer('person_id')->index('fk_relationship_person');
			$table->integer('related')->index('fk_relationship_related');
			$table->integer('type')->index('fk_relationship_type');
			$table->boolean('guardian');
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
		Schema::drop('relationship');
	}

}
