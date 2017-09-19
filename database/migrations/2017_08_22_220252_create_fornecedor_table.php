<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFornecedorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fornecedor', function(Blueprint $table)
		{
			$table->integer('idFornecedor')->primary();
			$table->boolean('ativo')->default(1);
			$table->string('nome');
			$table->string('cnpj', 14);
			$table->string('ie', 10)->nullable();
			$table->string('endereco');
			$table->string('bairro', 45);
			$table->string('cep', 9)->nullable()->default('00000-000');
			$table->string('fone', 12)->nullable()->default('XX-0000-0000');
			$table->string('celular', 13)->default('XX-90000-0000');
			$table->string('email');
            $table->timestamp('update_at');
            $table->timestamp('created_at');
			$table->integer('Cidade_idCidade')->index('fk_Fornecedor_Cidade1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fornecedor');
	}

}
