<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSortieCaissesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sortie_caisses', function(Blueprint $table)
		{
			$table->foreign('acteur_id', 'sortie_caisses_ibfk_1')->references('id')->on('acteurs')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('rubrique_id', 'sortie_caisses_ibfk_3')->references('id')->on('rubriques')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sortie_caisses', function(Blueprint $table)
		{
			$table->dropForeign('sortie_caisses_ibfk_1');
			$table->dropForeign('sortie_caisses_ibfk_3');
		});
	}

}
