<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubprodutoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subproduto', function(Blueprint $table)
		{
			$table->increments('idSubproduto');
			$table->string('tipo', 45);
			$table->integer('quantidade');
			$table->float('comprimento', 10, 0);
			$table->float('largura', 10, 0);
            $table->timestamp('update_at');
            $table->timestamp('created_at');
			$table->string('cor_idCor', 4)->index('fk_Chinelo_Cor1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subproduto');
	}

}
