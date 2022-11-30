<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresupuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Presupuestos', function (Blueprint $table) {
            $table->id();
            $table->float('totales');
            $table->float('honorarios');
            $table->float('ivaHonorarios');
            $table->float('totalHonorarios');
            $table->float('subtotalServicios');
            $table->boolean('lActivo');
            $table->bigInteger('idClient');
            //$table->foreignId('idClient')->constrained('clientes');
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
        Schema::dropIfExists('presupuestos');
    }
}
