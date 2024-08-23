<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssicurazionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assicuraziones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('macchine_id')->constrained('macchine_e_attrezzis')->onDelete('cascade');
            $table->string('compagnia_assicurativa')->nullable();
            $table->string('data_di_scadenza')->nullable();
            $table->string('la_rinnovo_ogni')->nullable();
            $table->boolean('avvisami_alla_scadenza')->default(0)->nullable();
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
        Schema::dropIfExists('assicuraziones');
    }
}
