<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $date = new DateTime();
        DB::table('creditos')->insert([
            ['nombre_credito' => 'Credito Tipo A',
            'descripcion' => 'Descripcion Credito Tipo A',
            'created_at' => $date,
            'updated_at' => $date],
            ['nombre_credito' => 'Credito Tipo B',
            'descripcion' => 'Descripcion Credito Tipo B',
            'created_at' => $date,
            'updated_at' => $date],
            ['nombre_credito' => 'Credito Tipo C',
            'descripcion' => 'Descripcion Credito Tipo C',
            'created_at' => $date,
            'updated_at' => $date],
            ['nombre_credito' => 'Credito Tipo D',
            'descripcion' => 'Descripcion Credito Tipo D',
            'created_at' => $date,
            'updated_at' => $date]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
