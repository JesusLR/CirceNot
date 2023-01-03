<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administradors', function (Blueprint $table) {
            $table->id();
            $table->string('cNombre');
            $table->string('cPrimerApellido');
            $table->string('cSegundoApellido');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('emailDos');
            $table->string('cUsuario');
            $table->string('cCURP');
            $table->string('cRFC');
            $table->integer('iTelefono');
            $table->integer('lActivo');
            $table->rememberToken();
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
        Schema::dropIfExists('administradors');
    }
}
