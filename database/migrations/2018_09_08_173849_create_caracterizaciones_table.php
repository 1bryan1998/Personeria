<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaracterizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracterizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('poblacion_vulnerable');
            $table->string('grupos_etnicos');
            $table->integer('persona_id')->unsigned();
            $table->timestamps();
            $table->foreign('persona_id')->references('id')->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caracterizaciones');
    }
}
