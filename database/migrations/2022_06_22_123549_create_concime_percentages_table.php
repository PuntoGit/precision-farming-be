<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcimePercentagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concime_percentages', function (Blueprint $table) {
            $table->id();
            $table->integer('prodotti_id')->unsigned();
            $table->string('azoto')->nullable();
            $table->string('fosforo')->nullable();
            $table->string('potassio')->nullable();
            $table->string('calcio')->nullable();
            $table->string('magnesio')->nullable();
            $table->string('zolfo')->nullable();
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
        Schema::dropIfExists('concime_percentages');
    }
}
