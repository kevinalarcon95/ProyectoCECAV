<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorarioPreicfesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario_preicfes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_preicfes');
            $table->text('horario'); 
            $table->timestamps();
            $table->foreign('id_preicfes')->references('id')->on('preicfes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horario_preicfes');
    }
}
