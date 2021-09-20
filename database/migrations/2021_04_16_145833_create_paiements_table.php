<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paiements', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('technicien_id')->index('technicien');
			$table->string('objet', 100);
			$table->bigInteger('mont_paie');
			$table->date('date_paie');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('paiements');
	}

}
