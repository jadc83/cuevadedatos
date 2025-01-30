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
        Schema::create('armas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable()->default(null);
            $table->string('imagen')->nullable()->default(null);
            $table->string('dano');
            $table->integer('alcance');
            $table->string('usos');
            $table->integer('cargador')->nullable();
            $table->decimal('valorLegal', 12, 2)->nullable();
            $table->decimal('valorIlegal', 12, 2)->nullable();
            $table->integer('fd');
            $table->string('epoca');
            $table->foreignId('tipo_arma_id')->constrained();
            $table->foreignId('especializacion_id')->constrained("especializaciones");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('armas');
    }
};
