<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NuevaMigracionParaUploader extends Migration

{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('libros', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained();
        });
    }

    public function down()
    {
        Schema::table('libros', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });
    }
};

