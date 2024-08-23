<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttivitaColturalisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attivita_colturalis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('farm_id')->nullable();
            $table->string('codice')->nullable();
            $table->string('inizio')->nullable();
            $table->string('fine')->nullable();
            $table->string('durata')->nullable();
            $table->string('ora_di_inizio')->nullable();
            $table->boolean('stato')->default(0)->nullable();
            $table->boolean('nascondi')->default(0)->nullable();
            $table->string('descrizione')->nullable();
            $table->string('lotto_di_campo')->nullable();
            $table->string('area_lavorata')->nullable();
            $table->string('litri_per_ettaro')->nullable();
            $table->string('volume_acqua_utilizzata')->nullable();
            $table->string('aggiungi_i_prodotti')->nullable();
            $table->string('prodotto_utilizzato')->nullable();
            $table->string('quantià_utilizzata')->nullable();
            $table->string('gg')->nullable();
            $table->string('h_gg')->nullable();
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
        Schema::dropIfExists('attivita_colturalis');
    }
}
