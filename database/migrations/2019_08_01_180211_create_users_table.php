<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('user');
			$table->string('password');
			$table->string('remember_token')->nullable();
			$table->string('nombre', 150);
			$table->string('email', 150);
			$table->string('foto_perfil')->default('img/compartidos/avatar10.jpg');
			$table->integer('online')->default(0)->nullable();
			$table->char('estatus', 1)->nullable()->default('A');
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
		Schema::drop('users');
	}

}
