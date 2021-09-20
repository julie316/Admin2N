<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreecaissesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entreecaisses', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('acteur_id')->index('acteur');
			$table->string('depositaire', 50);
			$table->string('libelle_ent_cais');
			$table->date('date_ent_cais');
			$table->bigInteger('mont_ent');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('entreecaisses');
	}

}
