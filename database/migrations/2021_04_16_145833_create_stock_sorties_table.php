<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockSortiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stock_sorties', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('stock_id')->index('stock');
			$table->date('date_sortie_stock');
			$table->integer('qte_sortie');
			$table->string('destinataire');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stock_sorties');
	}

}
