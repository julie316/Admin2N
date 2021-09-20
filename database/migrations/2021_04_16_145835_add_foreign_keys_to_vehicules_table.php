<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToVehiculesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vehicules', function(Blueprint $table)
		{
			$table->foreign('acteur_id', 'vehicules_ibfk_1')->references('id')->on('acteurs')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('proprietaire_id', 'vehicules_ibfk_3')->references('id')->on('proprietaires')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vehicules', function(Blueprint $table)
		{
			$table->dropForeign('vehicules_ibfk_1');
			$table->dropForeign('vehicules_ibfk_3');
		});
	}

}
