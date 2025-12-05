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
        Schema::create('sesiones_mantenimiento', function (Blueprint $table) {
            $table->id();
            $table->mantenimiento_id()->foreignId()->constrained('mantenimientos');
            $table->tecnico_id()->foreignId()->constrained('tecnicos');
            $table->datetime('fecha')->nullable();
            $table->float('horas_trabajadas')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('descripcion_trabajo')->nullable();
            $table->float('costo_total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesiones_mantenimiento');
    }
};
