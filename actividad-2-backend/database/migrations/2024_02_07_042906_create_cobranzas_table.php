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
        Schema::create('cobranzas', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_cuota');
            $table->double('valor_cuota');
            $table->string('estado');
            $table->foreignId('referenciacione_id')->constrained()
                    ->onUpdate('cascade');
            $table->foreignId('empleado_id')->constrained()
                    ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cobranzas');
    }
};
