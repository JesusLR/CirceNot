<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbGestoria', function (Blueprint $table) {
            $table->id('iIDGestoria');
            $table->integer('iIDGestoriaPatente');
            $table->string('cNombreGestoria');
            $table->integer('iNumGestoria');
            $table->string('cDomicilioGestoria');
            $table->string('cEmailGestoria');
            $table->string('iTelGestoria');
            $table->string('cLogoGestoria');
            $table->string('cRutaLogoGestoria');
            $table->boolean('lActivo');
            $table->boolean('lPA');
            $table->boolean('lPC');
            $table->boolean('lPE');
            $table->string('cPA_Libro');
            $table->string('cPA_Acta');
            $table->integer('iPA_FojaInic');
            $table->integer('iPA_FojaFin');
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
        Schema::dropIfExists('tbGestoria');
    }
}
