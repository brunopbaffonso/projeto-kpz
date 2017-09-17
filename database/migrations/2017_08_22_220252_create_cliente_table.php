<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClienteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cliente', function(Blueprint $table)
		{
			$table->integer('idCliente')->primary();
			$table->boolean('ativo')->default(1);
			$table->string('nome');
			$table->string('cnpj', 14)->nullable();
			$table->string('cpf', 11)->nullable();
			$table->string('ie', 10)->nullable()->default('N/A');
			$table->string('endereco');
			$table->string('bairro', 45);
			$table->string('cep', 9)->nullable()->default('00000-000');
			$table->string('fone', 12)->nullable()->default('XX-0000-0000');
			$table->string('celular', 13)->default('XX-90000-0000');
			$table->string('email');
            $table->timestamp('update_at');
            $table->timestamp('created_at');
			$table->integer('cidade_idCidade')->index('fk_Cliente_Cidade1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cliente');
	}

}
