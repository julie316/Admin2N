<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stocks', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('acteur_id')->index('acteur');
			$table->string('libelle_stock');
			$table->integer('qte_stock');
			$table->integer('qte_reste')->nullable();
			$table->date('date_entree_st');
			$table->integer('famille');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stocks');
	}

}
