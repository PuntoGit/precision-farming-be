<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientiFornitorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clienti_fornitoris', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('farm_id')->nullable();
            $table->integer('codice')->nullable();
            $table->foreignId('anagrafica_id')->constrained()->onDelete('cascade');
            $table->foreignId('documento_id')->constrained()->onDelete('cascade');
            $table->foreignId('referente_id')->constrained()->onDelete('cascade');
            $table->string('type')->nullable();
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
        Schema::dropIfExists('clienti_fornitoris');
    }
}
