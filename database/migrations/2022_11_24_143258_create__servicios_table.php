<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Servicios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('Type');
            $table->string('Description');
            $table->float('Price');
            $table->string('user_creator');
            $table->bigInteger('notaria_id');
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
        Schema::dropIfExists('Servicios');
    }
}
