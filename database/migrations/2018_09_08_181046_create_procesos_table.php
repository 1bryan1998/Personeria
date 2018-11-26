<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procesos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('proceso_a_seguir');
            $table->string('area_proceso');
            $table->text('resumen_factico');
            $table->string('estado')->default('Activo');
            $table->integer('persona_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('procesos');
    }
}
