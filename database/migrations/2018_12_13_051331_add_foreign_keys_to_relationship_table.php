<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRelationshipTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('relationship', function(Blueprint $table)
		{
			$table->foreign('person_id', 'fk_relationship_person')->references('id')->on('person')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('related', 'fk_relationship_related')->references('id')->on('person')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('type', 'fk_relationship_type')->references('id')->on('relationship_type')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('relationship', function(Blueprint $table)
		{
			$table->dropForeign('fk_relationship_person');
			$table->dropForeign('fk_relationship_related');
			$table->dropForeign('fk_relationship_type');
		});
	}

}
