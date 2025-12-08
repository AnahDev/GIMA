<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\EstadoActivo;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create('activos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('articulo_id')->constrained('articulos');
            $table->string('estado')->default(EstadoActivo::OPERATIVO->value);
            $table->foreignId('ubicacion_id')->constrained('ubicaciones');
            $table->float('valor')->nullable();
            $table->timestamps();
        });
    } 


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activos');
    }
};
