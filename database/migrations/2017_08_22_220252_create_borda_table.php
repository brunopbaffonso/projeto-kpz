<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBordaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('borda', function(Blueprint $table)
		{
			$table->integer('idBorda')->unsigned()->primary();
			$table->string('nome', 45);
			$table->decimal('precoBorda', 4);
			$table->string('undiadeMedida', 2);
			$table->string('cor_idCor', 4)->index('fk_Borda_Cor1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('borda');
	}

}
