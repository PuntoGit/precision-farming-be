<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movementis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('farm_id')->nullable();
            $table->string('nome_prodotto')->nullable();
            $table->string('magazzino_di_stoccaggio')->nullable();
            $table->string('q_ta_scaricata')->nullable();
            $table->string('q_ta_caricata')->nullable();
            $table->string('data')->nullable();
            $table->string('rif_fattura')->nullable();
            $table->string('causale')->nullable();
            $table->string('cliente_fornitore')->nullable();
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
        Schema::dropIfExists('movementis');
    }
}
