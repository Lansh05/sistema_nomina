<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEmpleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('nombre',100)->nullable();
            $table->string('apellidomat',100)->nullable();
            $table->string('apellidopat',100)->nullable();
            $table->integer('idpuesto')->nullable();
            $table->string('email',100)->nullable();
            $table->string('rfc',50)->nullable();
            $table->string('numtel',100)->nullable();
            $table->date('fechaalta')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
