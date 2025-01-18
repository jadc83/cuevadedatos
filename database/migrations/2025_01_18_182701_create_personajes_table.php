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
            $table->integer('fue');
            $table->integer('con');
            $table->integer('des');
            $table->integer('tam');
            $table->integer('apa');
            $table->integer('int');
            $table->integer('pod');
            $table->integer('edu');
            $table->integer('cor');
            $table->integer('cordura_maxima')->nullable();
            $table->integer('ingresos')->nullable();
            $table->integer('ahorros');
            $table->integer('efectivo');
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
