<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDocumentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('document', function(Blueprint $table)
		{
			$table->foreign('document_type_id', 'fk_document_document_type')->references('id')->on('document_type')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('person_id', 'fk_document_person')->references('id')->on('person')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('document', function(Blueprint $table)
		{
			$table->dropForeign('fk_document_document_type');
			$table->dropForeign('fk_document_person');
		});
	}

}
