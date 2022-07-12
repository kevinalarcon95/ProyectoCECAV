<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreicfesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preicfes', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->longText('descripcion');
            $table->text('imagen');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->date('fecha_inicio_inscripcion');
            $table->date('fecha_fin_inscripcion');
            $table->text('duracion');
            $table->double('valor');
            $table->text('tipo_curso');
            $table->mediumText('poblacion_objetivo');
            $table->mediumtext('estructura');
            $table->longText('pasos_inscripcion');
            $table->timestamps();


            $table->index('fecha_inicio');
            $table->index('fecha_fin');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preicfes');
    }
}
