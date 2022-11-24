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
            $table->id();
            $table->string('cNombre');
            $table->string('cPrimerApellido');
            $table->string('cSegundoApellido');
            $table->string('email')->unique();
            $table->string('emailDos')->unique();
            $table->string('cUsuario');
            $table->string('password');
            $table->string('cCURP');
            $table->string('cRFC');
            $table->string('iIDPermiso');
            $table->string('iIDPuesto');
            $table->string('iTelefono');
            $table->boolean('lActivo');
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
