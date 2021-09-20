<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToStockSortiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('stock_sorties', function(Blueprint $table)
		{
			$table->foreign('stock_id', 'stock_sorties_ibfk_1')->references('id')->on('stocks')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('stock_sorties', function(Blueprint $table)
		{
			$table->dropForeign('stock_sorties_ibfk_1');
		});
	}

}
