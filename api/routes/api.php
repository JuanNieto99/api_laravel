<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RolPermisoDetalleController;
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

//inicio 
Route::post('login', [AuthController::class, 'login']);
Route::post('recuperarContrasena', [AuthController::class, 'recuperarContrasena']); 
Route::post('usuariosCrear', [UsuarioController::class, 'create']); 


Route::group(['middleware'=>['auth:sanctum']], function () {  

    //Usuario
    Route::post('usuariosListar', [UsuarioController::class, 'index']); //->middleware('permission:sa');
    Route::post('usuarioMostrar/{id}', [UsuarioController::class, 'show']);
    Route::post('usuariosActualizar', [UsuarioController::class, 'update']);
    Route::post('usuariosEliminar', [UsuarioController::class, 'destroy']);  

    //Roles
    Route::post('rolListar', [RolController::class, 'index']);
    Route::post('rolCrear', [RolController::class, 'create']); 
    Route::get('rolMostrar/{id}', [RolController::class, 'show']); 
    Route::post('rolActualizar', [RolController::class, 'update']);
    Route::post('rolEliminar', [RolController::class, 'destroy']);

    //Permisos 
    Route::post('permisoCrear', [PermisoController::class, 'create']); 
    Route::post('permisoActualizar', [PermisoController::class, 'update']); 
    Route::post('permisoEliminar', [PermisoController::class, 'destroy']); 
    Route::post('permisoListar', [PermisoController::class, 'index']); 
    Route::get('permisoMostrar/{id}', [PermisoController::class, 'show']); 

    //Permisos detalle rol
    Route::post('permisoRolDetalleCrear', [RolPermisoDetalleController::class, 'create']); 


    Route::get('logout', [AuthController::class, 'logout']);  
});

