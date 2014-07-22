<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComentariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comentarios', function(Blueprint $table) {
			$table->increments('id');
			$table->string('comentario');
			$table->integer('articulo_id')->unsigned();
			$table->foreign('articulo_id')->references('id')->on('articulos');
			$table->integer('usuario_id')->unsigned();
			$table->foreign('usuario_id')->references('id')->on('usuarios');
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
		Schema::drop('comentarios');
	}

}
