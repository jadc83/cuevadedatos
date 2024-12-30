<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NuevaMigracionParaUploaderH extends Migration

{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('hechizos', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained();
        });
    }

    public function down()
    {
        Schema::table('hechizos', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });
    }
};
