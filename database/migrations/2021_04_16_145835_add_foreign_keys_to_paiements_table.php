<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPaiementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('paiements', function(Blueprint $table)
		{
			$table->foreign('technicien_id', 'paiements_ibfk_1')->references('id')->on('techniciens')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('paiements', function(Blueprint $table)
		{
			$table->dropForeign('paiements_ibfk_1');
		});
	}

}
