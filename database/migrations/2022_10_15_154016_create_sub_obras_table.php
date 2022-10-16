<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_obras', function (Blueprint $table) {
            $table->id();
            $table->integer('proyecto_id');
            $table->integer('area_id');
            $table->integer('tipoEstado_id');
            $table->string('cod');
            $table->string('nombre');
            $table->json('datos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_obras');
    }
}
