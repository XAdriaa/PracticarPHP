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
        Schema::create('servicios_pedidos_reparacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_reparacion_id')->constrained('pedidos_reparacion')->onDelete('cascade');
            $table->foreignId('servicios_id')->constrained('servicios')->onDelete('restrict');
            $table->integer('cantidad')->default(1);
            $table->decimal('precio', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios_pedidos_reparacion');
    }
};
