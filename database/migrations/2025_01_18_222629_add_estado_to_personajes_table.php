<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstadoToPersonajesTable extends Migration
{
    public function up()
    {
        Schema::table('personajes', function (Blueprint $table) {
            // Agregar un campo booleano 'estado' para indicar si están vivos o muertos
            $table->boolean('estado')->default(true); // true para vivo, false para muerto
        });
    }

    public function down()
    {
        Schema::table('personajes', function (Blueprint $table) {
            // Eliminar el campo 'estado' si se revierte la migración
            $table->dropColumn('estado');
        });
    }
}
