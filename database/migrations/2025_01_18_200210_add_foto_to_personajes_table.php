<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('personajes', function (Blueprint $table) {
            $table->string('foto')->nullable()->after('nacionalidad'); // Agregar columna "foto" después de "nacionalidad"
        });
    }

    public function down()
    {
        Schema::table('personajes', function (Blueprint $table) {
            $table->dropColumn('foto'); // Eliminar columna "foto" si se revierte la migración
        });
    }
};
