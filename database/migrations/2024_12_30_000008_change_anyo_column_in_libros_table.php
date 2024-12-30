<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAnyoColumnInLibrosTable extends Migration
{
    public function up()
    {
        Schema::table('libros', function (Blueprint $table) {
            // Cambiar el tipo de la columna 'anyo' a string y hacerla nullable
            $table->string('anyo', 50)->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('libros', function (Blueprint $table) {
            // Volver a la columna original y hacerla nullable
            $table->date('anyo')->nullable()->change();  // Asumiendo que originalmente era un tipo date
        });
    }
}
