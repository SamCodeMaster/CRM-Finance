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
        Schema::create('referenciaciones', function (Blueprint $table) {
            $table->id();
            $table->string('estado');
            $table->foreignId('comercializacione_id')->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('referenciaciones');
    }
};
