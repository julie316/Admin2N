<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVidangesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vidanges', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vehicule_id')->index('vehicule');
			$table->date('date_vid');
			$table->integer('type_huile');
			$table->integer('km_fixe');
			$table->integer('km_actuel');
			$table->integer('km_futur');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vidanges');
	}

}
