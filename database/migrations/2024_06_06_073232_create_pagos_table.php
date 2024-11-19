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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('suscripcion_id')->constrained('suscripcions')->onDelete('cascade');
            $table->decimal('monto', 10, 2);
            $table->date('fecha_pago');
            $table->enum('metodo_pago', ['tarjeta', 'transferencia', 'efectivo'])->default('efectivo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
