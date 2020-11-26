<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleHojaTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_hoja_trabajos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hojatrabajo_id')->unsigned()->nullable(true);
            $table->unsignedBigInteger('empleado_id')->unsigned()->nullable(true);
            $table->string('actividad',60)->nullable(true);
            $table->integer('horasUtilizadas')->nullable(true);
            $table->decimal('valor',8,2)->nullable(true);
            $table->decimal('costoTotal',8,2)->nullable(true);
            $table->foreign('hojatrabajo_id')->references('id')->on('hoja_trabajos');
            $table->foreign('empleado_id')->references('id')->on('empleados');
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
        Schema::dropIfExists('detalle_hoja_trabajos');
    }
}
