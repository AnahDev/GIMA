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
    Schema::create('ubicaciones', function (Blueprint $table) {
        $table->id();
        $table->foreignId('direccion_id')->constrained('direcciones');
        $table->string('edificio')->nullable();
        $table->string('piso')->nullable();
        $table->string('salon')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ubicaciones');
    }
};
