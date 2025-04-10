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
        Schema::create('especializacion_personaje', function (Blueprint $table) {
            $table->foreignId('especializacion_id')->constrained("especializaciones");
            $table->foreignId('personaje_id')->constrained();
            $table->integer('puntuacion');
            $table->primary(['especializacion_id', 'personaje_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especializacion_personaje');
    }
};
