<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item', function(Blueprint $table)
		{
			$table->increments('idPedido');
			$table->integer('quantidade');
			$table->float('largura', 10, 0)->unsigned();
			$table->float('comprimento', 10, 0)->unsigned();
			$table->string('unidadeMedida', 2)->nullable();
			$table->boolean('borda');
			$table->string('arte')->nullable();
<<<<<<< HEAD
			$table->decimal('precoUnit', 4);
=======
			$table->decimal('precoUnit', 6,2);
			$table->string('fonte', 45);
>>>>>>> f124d0269873ab0a188e79e0e72e6685797dfa51
            $table->timestamp('update_at');
            $table->timestamp('created_at');
			$table->integer('os_idOS')->unsigned()->index('fk_Item_OS_idx');
			$table->integer('tipoManta_idTipoManta')->unsigned()->index('fk_Item_TipoManta1_idx');
			$table->integer('tipoMaterial_idTipoMaterial')->unsigned()->index('fk_Item_TipoMaterial1_idx');
			$table->integer('borda_idBorda')->unsigned()->index('fk_Item_Borda1_idx');
			$table->integer('subproduto_idSubproduto')->unsigned()->index('fk_Item_Subproduto1_idx');
			$table->integer('modelo_idModelo')->unsigned()->index('fk_Item_Modelo1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('item');
	}

}
