<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\TipoMaterial;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('material_articulos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('articulo_id')->constrained('articulos')->cascadeOnDelete();
            $table->string('tipo')->default(TipoMaterial::MANUAL->value);
            $table->text('titulo')->nullable(false);
            $table->text('descripcion')->nullable();
            $table->text('url');
            $table->dateTime('fecha_subida')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_articulos');
    }
};
