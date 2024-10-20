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
        Schema::create('hechizo_libro', function (Blueprint $table) {
            $table->foreignId('libro_id')->constrained();
            $table->foreignId('hechizo_id')->constrained();
            $table->string('pivote');
            $table->primary(['hechizo_id', 'libro_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hechizo_libro');
    }
};
