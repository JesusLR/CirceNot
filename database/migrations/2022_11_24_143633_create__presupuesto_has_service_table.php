<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresupuestoHasServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Presupuesto_has_service', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_presupuesto');
            $table->bigInteger('id_service');
            $table->string('folio');
            $table->bigInteger('vigencia');
            $table->float('cantidad');
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
        Schema::dropIfExists('Presupuesto_has_service');
    }
}
