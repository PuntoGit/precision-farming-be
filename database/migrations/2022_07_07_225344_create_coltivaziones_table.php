<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColtivazionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coltivaziones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lotti_id')->constrained('lotti_di_campos')->onDelete('cascade');
            $table->string('coltivazione')->nullable();
            $table->string('data_di_impianto')->nullable();
            $table->string('certificazione')->nullable();
            $table->string('numero_anni_di_produzione')->nullable();
            $table->string('data_inizio_fioritura')->nullable();
            $table->string('data_fine_fioritura')->nullable();
            $table->string('data_prima_raccolta')->nullable();
            $table->string('produzione_prevista')->nullable();
            $table->string('lunghezza')->nullable();
            $table->string('larghezza')->nullable();
            $table->string('numero_di_piante')->nullable();
            $table->longText('note')->nullable();
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
        Schema::dropIfExists('coltivaziones');
    }
}
