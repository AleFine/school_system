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
        Schema::create('detalle_cursos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_curso');
            $table->unsignedBigInteger('id_competencia');
            $table->integer('nro_orden');
            $table->foreign('id_curso')->references('id_curso')->on('cursos')->onDelete('cascade');
            $table->foreign('id_competencia')->references('id_competencia')->on('competencias')->onDelete('cascade');
            $table->primary(['id_curso', 'id_competencia']);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_cursos');
    }
};
