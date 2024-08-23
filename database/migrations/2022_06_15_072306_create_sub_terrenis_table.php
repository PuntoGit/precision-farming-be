<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubTerrenisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_terrenis', function (Blueprint $table) {
            $table->id();
            $table->integer('terrenis_id')->unsigned();
            $table->string('area_graf_ha')->nullable();
            $table->string('area_cat_ha')->nullable();
            $table->string('sez')->nullable();
            $table->string('foglio')->nullable();
            $table->string('particelle')->nullable();
            $table->string('sub')->nullable();
            $table->string('comune')->nullable();
            $table->string('proprietario')->nullable();
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
        Schema::dropIfExists('sub_terrenis');
    }
}
