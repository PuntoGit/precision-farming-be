<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnagraficasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anagraficas', function (Blueprint $table) {
            $table->id();
            $table->string('cognome')->nullable();
            $table->string('nome')->nullable();
            $table->string('denominazione')->nullable();
            $table->string('indirizzo')->nullable();
            $table->string('citta')->nullable();
            $table->string('cap')->nullable();
            $table->string('prov')->nullable();
            $table->string('paese')->nullable();
            $table->string('cellulare')->nullable();
            $table->string('telefono')->nullable();
            $table->string('tipologia_persona')->nullable();
            $table->string('attivita_lavorativa')->nullable();
            $table->string('codice_destinatario_sdi')->nullable();
            $table->string('partita_iva')->nullable();
            $table->string('c_f')->nullable();
            $table->string('email')->nullable();
            $table->string('pec')->nullable();
            $table->longText('note')->nullable();
            $table->boolean('responsabile_del_trattamento')->default(0)->nullable();
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
        Schema::dropIfExists('anagraficas');
    }
}
