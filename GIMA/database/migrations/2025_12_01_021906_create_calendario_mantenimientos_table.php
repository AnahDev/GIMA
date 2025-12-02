<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create('calendario_mantenimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activo_id')->constrained('activos');
            $table->enum('tipo', ['correctivo', 'predictivo', 'preventivo']);
            $table->dateTime('fecha_programada');
            $table->foreignId('tecnico_asignado')->constrained('users');
            $table->enum('estado', ['pendiente', 'en_progreso', 'completado', 'cancelado'])
                ->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendario_mantenimientos');
    }
};
