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
        $timestamp = $date->getTimestamp();
        DB::table('roles')->insert([
                ['nombre_rol' => 'SUPER_USER',
                'created_at' => $date,
                'updated_at' => $date],
                ['nombre_rol' => 'COMERCIALIZACION',
                'created_at' => $date,
                'updated_at' => $date],
                ['nombre_rol' => 'REFERENCIACION',
                'created_at' => $date,
                'updated_at' => $date],
                ['nombre_rol' => 'COBRANZA',
                'created_at' => $date,
                'updated_at' => $date]
            ]
        );

        DB::table('logins')->insert(
            ['usuario' => 'super_user',
            'contrasena' => 'super_user',
            'role_id' => 1,
            'created_at' => $date,
            'updated_at' => $date]
        );
        
        DB::table('empleados')->insert(
            ['dni' => '123456789',
            'nombre' => 'Super',
            'apellido' => 'User',
            'telefono' => '3012993030',
            'direccion' => 'C. del Pintor Sorolla, 21, Ciutat Vella, 46002 València, España',
            'correo' => 'super_user@viu.com',
            'login_id' => 1,
            'created_at' => $date,
            'updated_at' => $date
            ]
        );
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
