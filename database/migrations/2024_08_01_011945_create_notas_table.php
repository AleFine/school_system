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
        Schema::create('notas', function (Blueprint $table) {
            $table->id('id_nota');
            $table->unsignedBigInteger('id_curso'); // Asegúrate de que esto coincida con el tipo en la tabla cursos
            $table->unsignedBigInteger('id_estudiante'); // Asegúrate de que esto coincida con el tipo en la tabla estudiantes
            $table->foreign('id_curso')->references('id_curso')->on('cursos')->onDelete('cascade'); 
            $table->foreign('id_estudiante')->references('id_estudiante')->on('estudiantes')->onDelete('cascade');
            $table->integer('notaUnidad1')->nullable();
            $table->integer('notaUnidad2')->nullable();
            $table->integer('notaUnidad3')->nullable();
            $table->timestamps();
        });
        
    }        

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
