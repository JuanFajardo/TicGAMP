<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajosTable extends Migration
{

    public function up()
    {
        Schema::create('trabajos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario');
            $table->string('funcionario');
            $table->string('unidad');
            $table->string('codBienes');
            $table->string('trabajo');
            $table->dateTime('fecha');
            $table->longText('firma');
            $table->string('sincro');

            $table->string('asignadoA')->comment('nombre');
            $table->string('asignadoPor')->comment('nombre');
            
            $table->string('observacion');
            $table->string('estado')->comment('entregado/visto/normal/complicado/terminado');
            $table->integer('id_user');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trabajos');
    }
}
