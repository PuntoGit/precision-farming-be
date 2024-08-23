<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInAttivitaColturalisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attivita_colturalis', function (Blueprint $table) {
            $table->longText('macchinari_utilizzati')->nullable();
            $table->longText('operai_o_addetti')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attivita_colturalis', function (Blueprint $table) {
            //
        });
    }
}
