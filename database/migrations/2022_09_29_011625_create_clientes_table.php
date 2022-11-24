<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbClienteF', function (Blueprint $table) {
            $table->id('idClient');
            $table->string('cNombre');
            $table->string('cApellidoMat');
            $table->string('cApellidoPat');
            $table->string('cEmail');
            $table->string('iTel');
            $table->string('iCel');
            $table->string('cCURP');
            $table->string('cRFC');
            $table->string('cOcupacion');
            $table->string('cPaisNacimiento');
            $table->string('cEstadoCivil');
            $table->string('cNombreConyugue');
            $table->string('iCalle1');
            $table->string('iNumExt1');
            $table->string('iNumInt1');
            $table->string('cCodPost1');
            $table->string('cColonia1');
            $table->string('cCiudad1');
            $table->string('cEstado1');
            $table->string('iCalle2');
            $table->string('iNumExt2');
            $table->string('iNumInt2');
            $table->string('cCodPost2');
            $table->string('cColonia2');
            $table->string('cCiudad2');
            $table->string('cEstado2');
            $table->string('cIdentificacionRuta');
            $table->string('cActaRuta');
            $table->string('cComprobanteRuta');
            $table->string('cFechaVencimientoRuta');
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
        Schema::dropIfExists('tbClienteF');
    }
}
