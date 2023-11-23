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
use App\Http\Controllers\HotelController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\MetodosPagoController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\TipoDocumentoController;
use Termwind\Components\Hr;

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

Route::get('/sinPermisos', function () {
    return response()->json(['error' => 'Erro Sin Permisos', 'code' => "error"], 403); 
})->name('sinPermisos');

//inicio 
Route::post('login', [AuthController::class, 'login']);
Route::post('recuperarContrasena', [AuthController::class, 'recuperarContrasena']); 



Route::group(['middleware'=>['auth:sanctum']], function () {  

    //Usuario
    Route::post('usuariosCrear', [UsuarioController::class, 'create']); 
    //Route::post('usuariosCrear', [UsuarioController::class, 'create']); 
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
    Route::post('clientesCrear', [ClienteController::class, 'create']); 
    Route::post('clientesActualizar', [ClienteController::class, 'update']); 
    Route::post('clientesEliminar', [ClienteController::class, 'destroy']); 
    Route::post('clientesListar', [ClienteController::class, 'index']); 
    Route::get('clientesMostrar/{id}', [ClienteController::class, 'show']); 

    //Habitaciones
    Route::post('habitacionesCrear', [HabitacionController::class, 'create']); 
    Route::post('habitacionesActualizar', [HabitacionController::class, 'update']); 
    Route::post('habitacionesEliminar', [HabitacionController::class, 'destroy']); 
    Route::post('habitacionesListar', [HabitacionController::class, 'index']); 
    Route::get('habitacionesMostrar/{id}', [HabitacionController::class, 'show']); 

    //Estado civil
    Route::post('estadoCivilListar', [EstadoCivilController::class, 'index']); 

    //Nivel estudio
    Route::post('nivelDeEstudioListar', [NivelEstudioController::class, 'index']); 

    //genero
    Route::post('generoListar', [GeneroController::class, 'index']); 

    //tipo_documento
    Route::post('tipoDocumentoListar', [TipoDocumentoController::class, 'index']); 

    //metodos pago
    Route::post('mediosPagoListar', [MetodosPagoController::class, 'index']); 

    //pais
    Route::post('paisListar', [PaisController::class, 'index']); 

    //departamento
    Route::post('departamentoListar', [DepartamentoController::class, 'index']); 
    Route::post('departamentoPaisListar', [DepartamentoController::class, 'indexGetByPais']); 

    //ciudad
    Route::post('ciudadListar', [CiudadController::class, 'index']); 
    Route::post('ciudadDepartamentoListar', [CiudadController::class, 'indexGetByDepartamento']); 

    //Hotel
    Route::post('hotelCrear', [HotelController::class, 'create']); 
    Route::post('hotelListar', [HotelController::class, 'index']); 
    Route::get('hotelMostrar/{id}', [HotelController::class, 'show']); 
    Route::post('hotelEliminar', [HotelController::class, 'destroy']); 
    Route::post('hotelActualizar', [HotelController::class, 'update']); 

    //Producto
    Route::post('productoCrear', [ProductosController::class, 'create']); 
    Route::post('productoListar', [ProductosController::class, 'index']); 
    Route::get('productoMostrar/{id}', [ProductosController::class, 'show']); 
    Route::post('productoEliminar', [ProductosController::class, 'destroy']); 
    Route::post('productoActualizar', [ProductosController::class, 'update']); 

    //Incentario
    Route::post('inventarioCrear', [InventarioController::class, 'create']); 
    Route::post('inventarioListar', [InventarioController::class, 'index']); 
    Route::get('inventarioMostrar/{id}', [InventarioController::class, 'show']); 
    Route::post('inventarioEliminar', [InventarioController::class, 'destroy']); 
    Route::post('inventarioActualizar', [InventarioController::class, 'update']); 

    //Accion ocupar habitacion
    Route::post('ocuparHabitacionCliente', [HabitacionController::class, 'ocupar']); 
    Route::post('desocuparHabitacionCliente', [HabitacionController::class, 'desocupar']); 


    Route::get('logout', [AuthController::class, 'logout']);  
});

