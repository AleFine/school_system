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
        Schema::create('estudiante_curso', function (Blueprint $table) {
            $table->unsignedBigInteger('id_curso');
            $table->unsignedBigInteger('id_estudiante');
            //$table->integer('notaUnidad1')->default(0);  // Valor por defecto de 0
            //$table->integer('notaUnidad2')->default(0);  // Valor por defecto de 0
            //$table->integer('notaUnidad3')->default(0);  // Valor por defecto de 0
            $table->foreign('id_curso')->references('id_curso')->on('cursos')->onDelete('cascade');
            $table->foreign('id_estudiante')->references('id_estudiante')->on('estudiantes')->onDelete('cascade');
            $table->primary(['id_curso', 'id_estudiante']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiante_curso');
    }
};
