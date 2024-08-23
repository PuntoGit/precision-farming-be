<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerrenisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terrenis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('farm_id')->nullable();
            $table->string('nome_terreno')->nullable();
            $table->string('codice')->nullable();
            $table->string('comune_di_appartenenza')->nullable();
            $table->string('costo_per_anno')->nullable();
            $table->string('ricavo_per_anno')->nullable();
            $table->string('tipo_di_gestione')->nullable();
            $table->string('nome_del_proprietario')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('stato')->nullable();
            $table->string('area_graf_ha')->nullable();
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
        Schema::dropIfExists('terrenis');
    }
}
