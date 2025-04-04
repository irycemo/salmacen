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
        Schema::create('precio_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('articulo_disponible_id')->references('id')->on('articulo_disponibles');
            $table->foreignId('entrada_id')->nullable()->constrained();
            $table->unsignedBigInteger('stock');
            $table->decimal('precio', 15,2)->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('precio_stocks');
    }
};
