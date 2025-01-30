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
        Schema::create('objeto_personaje', function (Blueprint $table) {
            $table->foreignId('personaje_id')->constrained('personajes');
            $table->foreignId('objeto_id')->constrained();
            $table->integer('cantidad')->default(1);
            $table->timestamps();
            $table->primary(['personaje_id', 'objeto_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objeto_personaje');
    }
};
