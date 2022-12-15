<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('videojuego_id')->unsigned();
            $table->bigInteger('aula_id')->unsigned();
            $table->time('tiempo_inicio');
            $table->time('tiempo_final');
            $table->date('fecha');
            $table->string('observacion');
            $table->timestamps();

            $table->foreign('videojuego_id')->references('id')->on('videojuegos')->onDelete('cascade');
            $table->foreign('aula_id')->references('id')->on('aulas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
};
