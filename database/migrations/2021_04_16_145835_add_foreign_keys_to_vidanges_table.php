<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToVidangesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vidanges', function(Blueprint $table)
		{
			$table->foreign('vehicule_id', 'vidanges_ibfk_1')->references('id')->on('vehicules')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vidanges', function(Blueprint $table)
		{
			$table->dropForeign('vidanges_ibfk_1');
		});
	}

}
