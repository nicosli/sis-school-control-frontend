<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('document', function(Blueprint $table)
		{
			$table->bigInteger('id')->primary();
			$table->string('description')->nullable();
			$table->bigInteger('document_type_id')->nullable()->index('fk_document_document_type');
			$table->integer('person_id')->index('fk_document_person');
			$table->string('path')->nullable();
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
		Schema::drop('document');
	}

}
