<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdottisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodottis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('farm_id')->nullable();
            $table->string('codice')->nullable();
            $table->string('nome_prodotto')->nullable();
            $table->string('descrizione')->nullable();
            $table->string('tipologia')->nullable();
            $table->string('iva')->nullable();
            $table->string('categoria')->nullable();
            $table->string('udm')->nullable();
            $table->string('p_netto')->nullable();
            $table->string('p_lordo')->nullable();
            $table->longText('note')->nullable();
            $table->string('magazzino_di_stoccaggio')->nullable();
            $table->string('giacenza_iniziale')->nullable();
            $table->string('soglia_minima')->nullable();
            $table->string('tipologia_prodotto')->nullable();
            $table->boolean('autorizzato_biologico')->default(0)->nullable();
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
        Schema::dropIfExists('prodottis');
    }
}
