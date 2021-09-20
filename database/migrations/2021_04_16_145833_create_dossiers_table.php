<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossiersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dossiers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vehicule_id')->nullable()->index('vehicule_id');
			$table->integer('categorie');
			$table->integer('libelle_dos');
			$table->date('date_souscrip');
			$table->integer('duree');
			$table->date('date_expire');
			$table->string('document');
			$table->string('matricule_veh', 100)->nullable();
			$table->string('type_camion', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dossiers');
	}

}
