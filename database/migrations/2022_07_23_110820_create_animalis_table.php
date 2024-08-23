<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animalis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stella_id')->nullable()->constrained('stellas');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('farm_id')->nullable();
            $table->string('codice')->nullable();
            $table->string('tipologia')->nullable();
            $table->string('specie')->nullable();
            $table->string('razza')->nullable();
            $table->string('eta_gg')->nullable();
            $table->string('eta_all_acquisto')->nullable();
            $table->string('note')->nullable();
            $table->boolean('nato_e_allevato')->default(0)->nullable();
            $table->boolean('allevato_modo')->default(0)->nullable();
            $table->boolean('razza_a_rischio')->default(0)->nullable();
            $table->string('riproduzione')->nullable();
            $table->string('causa_inserimento')->nullable();
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
        Schema::dropIfExists('animalis');
    }
}
