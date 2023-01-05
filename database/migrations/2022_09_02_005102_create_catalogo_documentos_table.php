<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogoDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbCatalogoDocumentos', function (Blueprint $table) {
            $table->id('iIDCatalogoDocumento');
            $table->string('cNombre');
            $table->string('cRuta');
            $table->string('cDescripcion');
            $table->string('iIDCategoria');
            $table->longText('cPlantilla');
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
        Schema::dropIfExists('tbCatalogoDocumentos');
    }
}
