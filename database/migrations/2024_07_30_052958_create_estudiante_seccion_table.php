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
        Schema::create('estudiante_seccion', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estudiante');
            $table->unsignedBigInteger('id_seccion');
            $table->timestamps();

            $table->foreign('id_estudiante')->references('id_estudiante')->on('estudiantes')->onDelete('cascade');
            $table->foreign('id_seccion')->references('id_seccion')->on('secciones')->onDelete('cascade');
            $table->primary(['id_estudiante', 'id_seccion']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiante_seccion');
    }
};
