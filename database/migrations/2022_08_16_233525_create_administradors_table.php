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
            $table->string('emailDos')->nullable();
            $table->string('cUsuario')->nullable();
            $table->string('cCURP')->nullable();
            $table->string('cRFC')->nullable();
            $table->integer('iTelefono')->nullable();
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
