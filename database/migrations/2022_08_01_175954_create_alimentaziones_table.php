<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlimentazionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alimentaziones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('farm_id')->nullable();
            $table->foreignId('alimenti_id')->nullable()->constrained('alimentis')->onDelete('cascade');
            $table->foreignId('stella_id')->nullable()->constrained('stellas')->onDelete('cascade');
            $table->string('data')->nullable();
            $table->string('quantita')->nullable();
            $table->string('motivazione')->nullable();
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
        Schema::dropIfExists('alimentaziones');
    }
}
