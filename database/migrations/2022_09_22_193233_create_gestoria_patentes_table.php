<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestoriaPatentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbGestoriaPatente', function (Blueprint $table) {
            $table->id('iIDGestoriaPatente');
            $table->string('cNombreTitular');
            $table->string('cApellitoPatTitular');
            $table->string('cApellitoMatTitular');
            $table->string('cDireccion');
            $table->string('cCorreo');
            $table->string('iTelefono');
            $table->string('iCelular');
            $table->string('cProfesionTitular');
            $table->string('cRFC');
            $table->string('cCURP');
            $table->string('cFechaNombramiento');
            $table->string('cRutaNombramiento');
            $table->string('cNombramiento');
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
        Schema::dropIfExists('tbGestoriaPatente');
    }
}
