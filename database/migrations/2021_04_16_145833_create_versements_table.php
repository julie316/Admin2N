<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVersementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('versements', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('paiement_id')->index('paiement_id');
			$table->integer('mont_verse');
			$table->date('date_verse');
			$table->integer('mode_paiement');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('versements');
	}

}
