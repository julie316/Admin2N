<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('maintenances', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('acteur_id')->index('acteur');
			$table->integer('technicien_id')->index('technicien');
			$table->integer('vehicule_id')->nullable()->index('maintenances_ibfk_3');
			$table->string('type_maint', 100)->nullable();
			$table->string('libelle_maint');
			$table->date('date_debut');
			$table->date('date_fin');
			$table->integer('mont_maint');
			$table->string('observation')->nullable();
			$table->string('facture');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('maintenances');
	}

}
