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
        Schema::create('cargo_colaborador', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cargo_id')->constrained('cargos');
            $table->foreignId('colaborador_id')->constrained('colaboradores');
            $table->integer('nota_desempenho')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargo_colaborador');
    }
};
