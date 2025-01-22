<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personajes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('nombre')->nullable();
            $table->string('profesion')->nullable();
            $table->integer('edad')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('estudios')->nullable();

            //caracteristicas
            $table->integer('fue');
            $table->integer('con');
            $table->integer('des');
            $table->integer('tam');
            $table->integer('apa');
            $table->integer('int');
            $table->integer('pod');
            $table->integer('edu');
            $table->integer('sue');
            $table->integer('mp');
            $table->integer('hp');
            $table->integer('cor');
            $table->integer('cor_actual');

            //dinero
            $table->integer('ingresos')->nullable();
            $table->integer('ahorros');
            $table->integer('efectivo');

            //habilidades
            $table->integer('antropologia')->default(1);
            $table->integer('arqueologia')->default(1);
            $table->integer('buscar_libros')->default(20);
            $table->integer('cerrajeria')->default(1);
            $table->integer('charlataneria')->default(1);
            $table->integer('ciencias_ocultas')->default(5);
            $table->integer('conducir_automovil')->default(20);
            $table->integer('conducir_maquinaria')->default(1);
            $table->integer('contabilidad')->default(5);
            $table->integer('credito')->default(0);
            $table->integer('derecho')->default(5);
            $table->integer('descubrir')->default(25);
            $table->integer('disfrazarse')->default(5);
            $table->integer('electricidad')->default(10);
            $table->integer('encanto')->default(15);
            $table->integer('equitación')->default(5);
            $table->integer('escuchar')->default(20);
            $table->integer('esquivar')->default(0);
            $table->integer('historia')->default(5);
            $table->integer('intimidar')->default(15);
            $table->integer('juego_de_manos')->default(10);
            $table->integer('lanzar')->default(20);
            $table->integer('mecanica')->default(10);
            $table->integer('medicina')->default(1);
            $table->integer('mitos_cthulhu')->default(0);
            $table->integer('nadar')->default(20);
            $table->integer('naturaleza')->default(10);
            $table->integer('orientarse')->default(10);
            $table->integer('persuasion')->default(10);
            $table->integer('primeros_auxilios')->default(30);
            $table->integer('psicoanalisis')->default(1);
            $table->integer('psicologia')->default(10);
            $table->integer('saltar')->default(20);
            $table->integer('seguir_rastros')->default(10);
            $table->integer('sigilo')->default(20);
            $table->integer('trepar')->default(20);


            $table->boolean('vivo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personajes');
    }
};
