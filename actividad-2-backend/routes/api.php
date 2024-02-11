<?php

use App\Http\Controllers\Empleado;
use App\Http\Controllers\Login;
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

// Route::post('/login/authenticate', function () {
//     $response = ["status"=>0,"msg"=>"msg"];
//     return response()->json($response);
//     //dd($pParam);
// });
