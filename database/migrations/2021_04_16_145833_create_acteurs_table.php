<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActeursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('acteurs', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nom_act');
			$table->string('prenom_act');
			$table->integer('tel_act');
			$table->string('email_act', 100);
			$table->string('pseudo', 50);
			$table->string('mot_passe');
			$table->integer('role');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('acteurs');
	}

}
