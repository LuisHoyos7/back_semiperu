<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actas', function (Blueprint $table) {
            $table->id();
            $table->integer('ordenCompra_id');
            $table->integer('tipoEstado_id');
            $table->string('cod');
            $table->string('nombre');
            $table->json('detalle')->nullable();
            $table->json('firmas_acta')->nullable();
            $table->json('comprobante')->nullable();
            $table->json('firmas_comprobante')->nullable();
            $table->json('archivos')->nullable();
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
        Schema::dropIfExists('actas');
    }
}
