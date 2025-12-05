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
        Schema::create('reportes_mantenimiento', function (Blueprint $table) {
            $table->id();
            $table->mantenimiento_id()->foreignId()->constrained('mantenimientos');
            $table->reporte_id()->foreignId()->constrained('reportes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes_mantenimiento');
    }
};
