<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('articulos', function (Blueprint $table) {
        $table->id();
        $table->enum('tipo', ['mobiliario', 'equipo']);
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
