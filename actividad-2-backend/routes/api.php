<?php

use App\Http\Controllers\Cliente;
use App\Http\Controllers\Cobranza;
use App\Http\Controllers\Comercializacion;
use App\Http\Controllers\Credito;
use App\Http\Controllers\Empleado;
use App\Http\Controllers\Login;
use App\Http\Controllers\Referenciacion;
use App\Http\Controllers\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('login')->controller(Login::class)->group(
    function () {
        Route::post('/authenticate', 'authenticate');
        Route::middleware('user_exist')->post('/add', 'add');
        Route::get('/delete/{pId}', 'delete');
        Route::middleware('user_exist')->post('/update/{pId}', 'update');
        Route::get('/findById/{pId}', 'findById');
    }
);

Route::prefix('rol')->controller(Rol::class)->group(
    function () {
        Route::get('/getAll', 'getAll');
        Route::middleware('rol_exist')->post('/add', 'add');
        Route::get('/delete/{pId}', 'delete');
        Route::middleware('rol_exist')->post('/update/{pId}', 'update');
        Route::get('/findById/{pId}', 'findById');
    }
);

Route::prefix('empleado')->controller(Empleado::class)->group(
    function () {
        Route::get('/getAll', 'getAll');
        Route::middleware('empleado_exist')->post('/add', 'add');
        Route::get('/delete/{pId}', 'delete');
        Route::middleware('empleado_exist')->post('/update/{pId}', 'update');
        Route::get('/findById/{pId}', 'findById');
        Route::get('/findByRol/{pRol}', 'findByRol');
    }
);

Route::prefix('cliente')->controller(Cliente::class)->group(
    function () {
        Route::get('/getAll', 'getAll');
        Route::middleware('cliente_exist')->post('/add', 'add');
        Route::get('/delete/{pId}', 'delete');
        Route::middleware('cliente_exist')->post('/update/{pId}', 'update');
        Route::get('/findById/{pId}', 'findById');
        Route::get('/findByDni/{pDni}', 'findByDni');
    }
);

Route::prefix('credito')->controller(Credito::class)->group(
    function (){
        Route::get('/getAll', 'getAll');
    }
);

Route::prefix('comercializacion')->controller(Comercializacion::class)->group(
    function (){
        Route::get('/getAll', 'getAll');
        Route::post('/add', 'add');
        Route::post('/update','update');
        Route::get('/delete/{pId}', 'delete');
        Route::get('/findById/{pId}', 'findById');
        Route::get('/findByEmpleadoId/{pEmpleadoId}', 'findByEmpleadoId');
        Route::get('/findByClienteId/{pClienteId}', 'findByClienteId');
        Route::get('/findByCreditoId/{pCreditoId}', 'findByCreditoId');

    }
);

Route::prefix('referenciacion')->controller(Referenciacion::class)->group(
    function (){
        Route::get('/getAll', 'getAll');
        Route::post('/add', 'add');
        Route::post('/update','update');
        Route::get('/delete/{pId}', 'delete');
        Route::get('/findById/{pId}', 'findById');
        Route::get('/findByEmpleadoId/{pEmpleadoId}', 'findByEmpleadoId');
    }
);


Route::prefix('cobranza')->controller(Cobranza::class)->group(
    function (){
        Route::get('/getAll', 'getAll');
        Route::post('/add', 'add');
        Route::post('/update','update');
        Route::get('/delete/{pId}', 'delete');
        Route::get('/findById/{pId}', 'findById');
    }
);





// Route::post('/login/authenticate', function () {
//     $response = ["status"=>0,"msg"=>"msg"];
//     return response()->json($response);
//     //dd($pParam);
// });
