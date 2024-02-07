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
        Schema::create('comercializaciones', function (Blueprint $table) {
            $table->id();
            $table->double('monto_credito');
            $table->integer('numero_total_cuotas');
            $table->string('estado');
            $table->foreignId('empleado_id')->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('cliente_id')->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('credito_id')->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comercializaciones');
    }
};
