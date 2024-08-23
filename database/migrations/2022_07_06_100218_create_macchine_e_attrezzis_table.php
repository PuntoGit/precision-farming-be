<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMacchineEAttrezzisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('macchine_e_attrezzis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('farm_id')->nullable();
            $table->integer('codice')->nullable();
            $table->string('nome_macch_attr')->nullable();
            $table->string('marca_produttore')->nullable();
            $table->string('numero_di_matricola')->nullable();
            $table->string('data_acq')->nullable();
            $table->string('ore_di_lavoro_alla_registrazione')->nullable();
            $table->string('ore_di_lavoro_calcolate')->nullable();
            $table->string('km_di_lavoro_attuali')->nullable();
            $table->string('tipologia')->nullable();
            $table->string('foto')->nullable();
            $table->string('modello')->nullable();
            $table->string('descrizione')->nullable();
            $table->boolean('utilizzo_di_carburante')->default(0)->nullable();
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
        Schema::dropIfExists('macchine_e_attrezzis');
    }
}
