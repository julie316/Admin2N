<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechniciensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('techniciens', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nom_tech');
			$table->integer('tel_tech');
			$table->integer('number')->nullable();
			$table->string('email_tech', 100)->nullable();
			$table->string('metier', 100);
			$table->string('cni');
			$table->string('local_atelier', 100);
			$table->string('ville', 100);
			$table->string('contrat')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('techniciens');
	}

}
