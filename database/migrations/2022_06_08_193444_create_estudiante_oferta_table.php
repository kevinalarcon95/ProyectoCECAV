<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudianteOfertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante_oferta', function (Blueprint $table) {
            $table->unsignedBigInteger('id_oferta');
            $table->integer('id_estudiante');
            $table->text('estado');
            $table->timestamps();

            $table->primary(['id_estudiante', 'id_oferta']);
            $table->foreign('id_estudiante')->references('identificacion')->on('aspi_oferta'); 
            $table->foreign('id_oferta')->references('id')->on('oferta'); 

            $table->index('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiante_oferta');
    }
}
