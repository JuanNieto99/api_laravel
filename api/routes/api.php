<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EstadoCivilController;
use App\Http\Controllers\NivelEstudioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RolPermisoDetalleController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\MetodosPagoController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\TipoDocumentoController;

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

    //Clientes
    Route::post('ClientesCrear', [ClienteController::class, 'create']); 
    Route::post('ClientesActualizar', [ClienteController::class, 'update']); 
    Route::post('ClientesEliminar', [ClienteController::class, 'destroy']); 
    Route::post('ClientesListar', [ClienteController::class, 'index']); 
    Route::get('ClientesMostrar/{id}', [ClienteController::class, 'show']); 

    //Habitaciones
    Route::post('HabitacionesCrear', [HabitacionController::class, 'create']); 
    Route::post('HabitacionesActualizar', [HabitacionController::class, 'update']); 
    Route::post('HabitacionesEliminar', [HabitacionController::class, 'destroy']); 
    Route::post('HabitacionesListar', [HabitacionController::class, 'index']); 
    Route::get('HabitacionesMostrar/{id}', [HabitacionController::class, 'show']); 

    //Estado civil
    Route::post('EstadoCivilListar', [EstadoCivilController::class, 'index']); 

    //Nivel estudio
    Route::post('NicelDeEsrudioListar', [NivelEstudioController::class, 'index']); 

    //genero
    Route::post('GeneroListar', [GeneroController::class, 'index']); 

    //tipo_documento
    Route::post('TipoDocumentoListar', [TipoDocumentoController::class, 'index']); 

    //metodos pago
    Route::post('MediosPagoListar', [MetodosPagoController::class, 'index']); 

    //pais
    Route::post('PaisListar', [PaisController::class, 'index']); 

    //departamento
    Route::post('DepartamentoListar', [DepartamentoController::class, 'index']); 
    Route::post('DepartamentoPaisListar', [DepartamentoController::class, 'indexGetByPais']); 

    //ciudad
    Route::post('CiudadListar', [CiudadController::class, 'index']); 
    Route::post('CiudadDepartamentoListar', [CiudadController::class, 'indexGetByDepartamento']); 


    Route::get('logout', [AuthController::class, 'logout']);  
});

