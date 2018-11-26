<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivoProcesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivo_procesos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url_archivo');

            $table->integer('proceso_id')->unsigned();
            $table->timestamps();
            $table->foreign('proceso_id')->references('id')->on('procesos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archivo_procesos');
    }
}
