<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_di_documento')->nullable();
            $table->string('numero')->nullable();
            $table->string('ente_di_rilascio')->nullable();
            $table->string('data_rilascio')->nullable();
            $table->string('data_scadenza')->nullable();
            $table->string('data_di_nascita')->nullable();
            $table->string('comune_di_nascita')->nullable();
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
        Schema::dropIfExists('documentos');
    }
}
