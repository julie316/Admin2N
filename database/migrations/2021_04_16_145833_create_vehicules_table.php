<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicules', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('proprietaire_id')->index('proprietaire');
			$table->integer('acteur_id')->index('acteur');
			$table->string('marque', 100);
			$table->string('matricule', 100);
			$table->string('type_veh', 100);
			$table->integer('litre_huile');
			$table->integer('nature_carbur');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicules');
	}

}
