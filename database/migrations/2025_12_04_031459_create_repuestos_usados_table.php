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
        Schema::create('repuestos_usados', function (Blueprint $table) {
            $table->id();
            $table->sesion_id()->foreignId()->constrained('sesiones_mantenimiento');
            $table->repuestos_id()->foreignId()->constrained('repuestos');
            $table->float('cantidad')->nullable();
            $table->float('costo_total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repuestos_usados');
    }
};
