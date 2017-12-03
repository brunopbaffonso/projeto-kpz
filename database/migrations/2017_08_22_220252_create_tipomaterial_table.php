<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTipomaterialTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tipomaterial', function(Blueprint $table)
		{
			$table->integer('idTipoMaterial')->unsigned()->unique('idTipoMaterial_UNIQUE');
			$table->string('nome', 45);
			$table->decimal('precoMaterial', 6,2);
			$table->string('unidadeMedida', 45);
			$table->string('cor_idCor', 4)->index('fk_TipoMaterial_Cor1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tipomaterial');
	}

}
