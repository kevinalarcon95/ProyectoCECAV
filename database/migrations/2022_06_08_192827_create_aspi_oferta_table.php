<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAspiOfertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspi_oferta', function (Blueprint $table) {
            //$table->id(); 
            $table->unsignedBigInteger('id_oferta');
            $table->text('nombre');            
            $table->text('apellido');
            $table->text('tipo_identificacion'); 
            $table->integer('identificacion');
            $table->text('direccion_residencia');
            $table->text('telefono');
            $table->text('tipo_inscripcion'); 
            $table->text('tipo_vinculacion'); 
            $table->integer('codigo_universitario')->nullable();
            $table->text('profesion'); //no nullable porque en econtrolador si el campo llega nuevo por default le ponemos No aplica
            $table->text('programa');//no nullable porque en econtrolador si el campo llega nuevo por default le ponemos No aplica
            $table->text('entidad');//no nullable porque en econtrolador si el campo llega nuevo por default le ponemos No aplica
            $table->integer('nit_entidad')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->timestamps();
            
           



            $table->primary(['id_oferta', 'identificacion']);
            $table->index('identificacion');
            $table->foreign('id_oferta')->references('id')->on('oferta'); 
            $table->foreign('id_user')->references('id')->on('users'); 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aspi_oferta');
    }
}
