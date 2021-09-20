<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEntreecaissesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('entreecaisses', function(Blueprint $table)
		{
			$table->foreign('acteur_id', 'entreecaisses_ibfk_1')->references('id')->on('acteurs')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('entreecaisses', function(Blueprint $table)
		{
			$table->dropForeign('entreecaisses_ibfk_1');
		});
	}

}
