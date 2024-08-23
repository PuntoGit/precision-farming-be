<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcimeExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concime_extras', function (Blueprint $table) {
            $table->id();
            $table->integer('prodotti_id')->unsigned();
            $table->boolean('ferro')->default(0)->nullable();
            $table->boolean('manganese')->default(0)->nullable();
            $table->boolean('molibdeno')->default(0)->nullable();
            $table->boolean('rame')->default(0)->nullable();
            $table->boolean('boro')->default(0)->default(0)->nullable();
            $table->boolean('zinco')->default(0)->nullable();
            $table->boolean('nichel')->default(0)->nullable();
            $table->boolean('sodio')->default(0)->nullable();
            $table->boolean('selenio')->default(0)->nullable();
            $table->boolean('alluminio')->default(0)->nullable();
            $table->boolean('silicio')->default(0)->nullable();
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
        Schema::dropIfExists('concime_extras');
    }
}
