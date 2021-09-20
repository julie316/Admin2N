<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMaintenancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('maintenances', function(Blueprint $table)
		{
			$table->foreign('acteur_id', 'maintenances_ibfk_1')->references('id')->on('acteurs')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('technicien_id', 'maintenances_ibfk_2')->references('id')->on('techniciens')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicule_id', 'maintenances_ibfk_3')->references('id')->on('vehicules')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('maintenances', function(Blueprint $table)
		{
			$table->dropForeign('maintenances_ibfk_1');
			$table->dropForeign('maintenances_ibfk_2');
			$table->dropForeign('maintenances_ibfk_3');
		});
	}

}
