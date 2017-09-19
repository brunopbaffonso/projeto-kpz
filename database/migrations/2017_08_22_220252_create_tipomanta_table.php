<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTipomantaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tipomanta', function(Blueprint $table)
		{
			$table->integer('idTipoManta')->unsigned()->unique('idTipoManta_UNIQUE');
			$table->string('nome', 45);
			$table->decimal('precoManta', 4);
			$table->string('unidadeMedida', 2);
			$table->string('cor_idCor', 4)->index('fk_TipoManta_Cor1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tipomanta');
	}

}
