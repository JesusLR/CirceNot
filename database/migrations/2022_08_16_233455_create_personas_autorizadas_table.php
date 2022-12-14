<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasAutorizadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas_autorizadas', function (Blueprint $table) {
            $table->id('iIDPersonaAutorizada');
            $table->string('cNombre');
            $table->string('cPrimerApellido');
            $table->string('cSegundoApellido');
            $table->string('email')->unique();
            $table->string('emailDos')->unique();
            $table->string('cUsuario')->nullable();
            $table->string('password')->nullable();
            $table->string('cCURP')->nullable();
            $table->string('cRFC')->nullable();
            $table->string('iIDPermiso')->nullable();
            $table->string('iIDPuesto')->nullable();
            $table->string('iTelefono')->nullable();
            $table->boolean('lActivo')->nullable();
            // $table->rememberToken();
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
        Schema::dropIfExists('personas_autorizadas');
    }
}
