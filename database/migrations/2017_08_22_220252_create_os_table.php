<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('os', function(Blueprint $table)
		{
			$table->primary('idOS');
            $table->string('contato', 255);
            $table->integer('status');
			$table->decimal('precoTotal', 6,2);
			$table->decimal('desconto', 6,2)->nullable();
			$table->string('formaPgto', 45);
			$table->string('observacoes')->nullable()->default('N/A');
            $table->timestamp('update_at');
            $table->timestamp('created_at');
			$table->string('usuario_cpf', 11)->index('fk_OS_Usuario1_idx');
			$table->integer('cliente_idCliente')->index('fk_OS_Cliente1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('os');
	}

}
