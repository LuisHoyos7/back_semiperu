<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acts', function (Blueprint $table) {
            $table->id();
            $table->integer('order_buy_id');
            $table->integer('state_type_id');
            $table->string('code');
            $table->string('name');
            $table->json('detail')->nullable();
            $table->json('files')->nullable();
            $table->json('firms')->nullable();
            $table->json('voucher')->nullable();
            $table->json('data')->nullable();
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
        Schema::dropIfExists('acts');
    }
}
