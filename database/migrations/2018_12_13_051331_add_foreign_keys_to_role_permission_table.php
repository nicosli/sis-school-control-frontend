<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRolePermissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('role_permission', function(Blueprint $table)
		{
			$table->foreign('permission', 'fk_permissionrole')->references('id')->on('permission')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('role', 'fk_rolepermission')->references('id')->on('role')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('role_permission', function(Blueprint $table)
		{
			$table->dropForeign('fk_permissionrole');
			$table->dropForeign('fk_rolepermission');
		});
	}

}
