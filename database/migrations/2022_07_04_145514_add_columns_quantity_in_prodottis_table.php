<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsQuantityInProdottisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prodottis', function (Blueprint $table) {
            $table->string('q_ta_scaricata')->nullable();
            $table->string('q_ta_caricata')->nullable();
            $table->string('data_ultimo_carico')->nullable();
            $table->string('data_ultimo_scarico')->nullable();
            $table->string('rif_fattura')->nullable();
            $table->string('causale')->nullable();
            $table->string('cliente_fornitore')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prodottis', function (Blueprint $table) {
            //
        });
    }
}
