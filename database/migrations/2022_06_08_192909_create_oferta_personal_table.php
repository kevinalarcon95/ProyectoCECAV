<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertaPersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oferta_personal', function (Blueprint $table) {
            $table->unsignedBigInteger('id_personal');
            $table->unsignedBigInteger('id_oferta');
            $table->timestamps();

            $table->primary(['id_personal', 'id_oferta']);
            $table->foreign('id_personal')->references('id')->on('personal'); 
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
        Schema::dropIfExists('oferta_personal');
    }
}
