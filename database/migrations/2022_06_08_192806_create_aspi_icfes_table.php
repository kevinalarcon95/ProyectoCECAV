<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAspiIcfesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspi_icfes', function (Blueprint $table) {
            //$table->id(); 
            $table->text('tipo_identificacion'); 
            $table->integer('identificacion'); 
            $table->text('nombre_apellido');
            $table->text('direccion_residencia');
            $table->text('telefono');            
            $table->text('correo')->unique();
            $table->text('colegio'); 
            $table->text('departamento_colegio');  
            $table->text('municipio_colegio');
            $table->text('nombre_apellido_acudiente');
            $table->text('correo_acudiente');
            $table->text('tipo_curso');
            $table->text('pregrado');
            $table->text('horario');
            $table->unsignedBigInteger('id_icfes');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            $table->primary(['identificacion', 'id_icfes']);
            $table->foreign('id_icfes')->references('id')->on('preicfes');
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
        Schema::dropIfExists('aspi_icfes');
    }
}
