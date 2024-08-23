<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapettisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capettis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('farm_id')->nullable();
            $table->string('nome')->nullable();
            $table->string('capetti_licence')->nullable();
            $table->string('capetti_mac_base')->nullable();
            $table->string('capetti_mac_sonda')->nullable();
            $table->string('temp_low')->nullable();
            $table->string('hum_low')->nullable();
            $table->string('temp_high')->nullable();
            $table->string('hum_high')->nullable();
        });
    }
}
