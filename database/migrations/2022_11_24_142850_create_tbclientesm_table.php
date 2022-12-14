<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbclientesmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbClienteM', function (Blueprint $table) {
            $table->id('iIDClienteM');
            $table->string('cRazonSocial');
            $table->string('cEmail');
            $table->string('iTel');
            $table->string('iCel');
            $table->string('cDomicilioFiscal');
            $table->string('cEntidad');
            $table->string('cCodigoPost');
            $table->string('cRFC');
            $table->string('cRegimenFisc');
            $table->string('iIDClienteF');
            $table->string('cActaRuta');
            $table->string('cDocumentacionRuta');
            $table->string('iTipo');
            $table->boolean('lActivo');
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
        Schema::dropIfExists('tbclientesM');
    }
}
