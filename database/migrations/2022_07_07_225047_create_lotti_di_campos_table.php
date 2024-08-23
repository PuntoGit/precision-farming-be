<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLottiDiCamposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotti_di_campos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('farm_id')->nullable();
            $table->string('codice')->nullable();
            $table->string('nome')->nullable();
            $table->string('coltura')->nullable();
            $table->string('area_util_ha')->nullable();
            $table->string('terreno')->nullable();
            $table->longText('particelle_catastali')->nullable();
            $table->string('apertura')->nullable();
            $table->string('chiusura')->nullable();
            $table->boolean('stagione')->default(0)->nullable();
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
        Schema::dropIfExists('lotti_di_campos');
    }
}
