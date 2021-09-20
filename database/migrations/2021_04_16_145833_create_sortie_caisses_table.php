<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSortieCaissesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sortie_caisses', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('acteur_id')->index('acteur');
			$table->integer('rubrique_id')->index('rubrique');
			$table->string('libelle_sort_cais');
			$table->date('date_sort_cais');
			$table->string('beneficiaire');
			$table->bigInteger('mont_sort');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sortie_caisses');
	}

}
