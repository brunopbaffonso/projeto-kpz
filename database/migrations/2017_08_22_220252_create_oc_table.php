<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOcTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oc', function(Blueprint $table)
		{
			$table->increments('idOC');
			$table->string('tipo', 45);
			$table->string('observacoes')->nullable()->default('N/A');
            $table->timestamp('update_at');
            $table->timestamp('created_at');
			$table->string('usuario_cpf', 11)->index('fk_OC_Usuario1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('oc');
	}

}
