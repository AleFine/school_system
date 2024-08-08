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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id('id_curso');
            $table->string('nombre_curso');
            $table->unsignedBigInteger('id_seccion');
            $table->unsignedBigInteger('id_trabajador');
            $table->foreign('id_seccion')->references('id_seccion')->on('secciones')->onDelete('cascade');
            $table->foreign('id_trabajador')->references('id_trabajador')->on('personal')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
