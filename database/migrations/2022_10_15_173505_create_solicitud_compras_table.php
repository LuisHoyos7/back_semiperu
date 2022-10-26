<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_compras', function (Blueprint $table) {
            $table->id();
            $table->integer('proveedor_id');
            $table->integer('encargado_id');
            $table->integer('tipoMoneda_id');
            $table->integer('tipoEstado_id');
            $table->string('cod');
            $table->string('nombre');
            $table->string('formaPago');
            $table->string('terminoPago');
            $table->json('detalle')->nullable();
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
        Schema::dropIfExists('solicitud_compras');
    }
}
