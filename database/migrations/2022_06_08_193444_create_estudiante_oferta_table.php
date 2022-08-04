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
            $table->unsignedBigInteger('id_user');
            $table->text('estado');
            $table->text('referencia');
            $table->timestamps();

            $table->primary(['id_user', 'id_oferta']);
            $table->foreign('id_user')->references('id_user')->on('aspi_oferta'); 
            $table->foreign('id_oferta')->references('id')->on('oferta'); 
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
