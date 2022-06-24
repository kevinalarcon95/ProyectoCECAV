<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oferta', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->text('descripcion');
            $table->text('tipo_pago');
            $table->text('unidad_academica');
            $table->text('imagen');
            $table->text('poblacion_objetivo');
            $table->unsignedBigInteger('id_categoria');
            $table->text('costo');        
            $table->date('fecha_inicio');
            $table->text('resolucion')->unique();
            $table->text('intensidad_horario');
            $table->integer('limite_cupos');
            $table->date('fecha_fin');
            $table->text('tipo_curso');   
            $table->date('fecha_cierre_inscripcion');
            $table->unsignedBigInteger('id_certificado');
            $table->timestamps();


            $table->index('tipo_curso');
            $table->foreign('id_categoria')->references('id')->on('categoria'); 
            $table->foreign('id_certificado')->references('id')->on('certificado'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oferta');
    }
}
