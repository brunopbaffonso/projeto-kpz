<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInsumoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('insumo', function(Blueprint $table)
		{
			$table->increments('idInsumo');
			$table->integer('quantidade');
			$table->integer('comprimento');
			$table->integer('largura');
			$table->string('unidadeMedida', 2);
			$table->decimal('precoUnit', 6,2);
            $table->timestamp('update_at');
            $table->timestamp('created_at');
			$table->integer('oc_idOC')->index('fk_Insumo_OC1_idx');
			$table->string('usuario_cpf', 45)->index('fk_Insumo_Usuario1_idx');
			$table->integer('cor_idCor')->index('fk_Insumo_Cor1_idx');
			$table->integer('fornecedor_idFornecedor')->index('fk_Insumo_Fornecedor1_idx');
			$table->integer('tipoManta_idTipoManta')->unsigned()->index('fk_Insumo_TipoManta1_idx');
			$table->integer('tipoMaterial_idTipoMaterial')->unsigned()->index('fk_Insumo_TipoMaterial1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('insumo');
	}

}
