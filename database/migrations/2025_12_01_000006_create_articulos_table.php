<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\TipoArticulo;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('articulos', function (Blueprint $table) {
        $table->id();
        $table->string('tipo')->default(TipoArticulo::EQUIPO->value)->nullable(false);
        $table->string('marca')->nullable();
        $table->string('modelo')->nullable();
        $table->text('descripcion')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulos');
    }
};
