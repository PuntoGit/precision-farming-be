<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStellasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stellas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('farm_id')->nullable();
            $table->string('codice')->nullable();
            $table->string('nome')->nullable();
            $table->string('area_coperta')->nullable();
            $table->boolean('tenuta_pavimentazione')->default(0)->nullable();
            $table->boolean('areazione_adeguata')->default(0)->nullable();
            $table->boolean('la_sezione')->default(0)->nullable();
            $table->string('tecnica_alimentazione')->nullable();
            $table->string('illuminazione')->nullable();
            $table->boolean('vengono_utilizzati')->default(0)->nullable();
            $table->string('area_scoperta')->nullable();
            $table->boolean('terreno_salubre')->default(0)->nullable();
            $table->boolean('terreno_bio')->default(0)->nullable();
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
        Schema::dropIfExists('stellas');
    }
}
