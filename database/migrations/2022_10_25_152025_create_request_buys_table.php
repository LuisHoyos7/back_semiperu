<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_buys', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->integer('user_id');
            $table->integer('currency_type_id');
            $table->integer('state_type_id');
            $table->string('code');
            $table->string('name');
            $table->string('payment_method');
            $table->string('payment_term');
            $table->json('detail')->nullable();
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
        Schema::dropIfExists('request_buys');
    }
}
