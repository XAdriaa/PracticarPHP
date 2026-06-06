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
        Schema::create('pedidos_reparacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('moto_id')->constrained('motos')->onDelete('cascade');
            $table->foreignId('mecanico_id')->nullable()->constrained('mecanicos')->onDelete('set null');
            $table->text('descripcion')->nullable();
            $table->enum('status', ['pendiente', 'reparando', 'listo', 'entregada'])->default('pendiente');
            $table->date('fecha_entrada');
            $table->date('fecha_salida')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos_reparacion');
    }
};