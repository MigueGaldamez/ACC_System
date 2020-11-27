<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHojaTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoja_trabajos', function (Blueprint $table) {
            $table->id();
            $table->string('cliente',60)->nullable(true);
            $table->string('servicio',60)->nullable(true);
            $table->date('fechainicio')->nullable(true);
            $table->date('fechafin')->nullable(true);
            $table->decimal('cif',8,2)->nullable(true);
            $table->decimal('factor',8,2)->nullable(true);
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
        Schema::dropIfExists('hoja_trabajos');
    }
}
