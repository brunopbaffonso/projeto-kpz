<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuario', function(Blueprint $table)
		{
            $table->dropPrimary();
			$table->string('cpf')->primary();
			$table->boolean('ativo')->default(1);
			$table->integer('tipoAcesso', false, true);
			$table->string('nome', 255);
			$table->string('fone', 12)->nullable()->default('XX-0000-0000');
			$table->string('celular', 13)->default('XX-90000-0000');
			$table->string('email', 255);
			$table->string('password')->unique();
            $table->timestamp('update_at');
            $table->timestamp('created_at');
			$table->rememberToken();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuario');
	}

}
