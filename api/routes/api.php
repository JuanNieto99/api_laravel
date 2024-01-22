<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ConsumoController;
use App\Http\Controllers\ControllerAbonos;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\DetalleHabitacionController;
use App\Http\Controllers\EstadoCivilController;
use App\Http\Controllers\FacturacionController;
use App\Http\Controllers\NivelEstudioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RolPermisoDetalleController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\MedidaController;
use App\Http\Controllers\MetodosPagoController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\SecuenciaExternaController;
use App\Http\Controllers\SecuenciaInternaController;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\TipoHabitacionController;
use App\Models\TiposContribuyentes;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Log;
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
Route::get('sokets', [AuthController::class, 'sokets']);

Route::group(['middleware'=>['auth:sanctum']], function () {  

    Route::group(['middleware'=>'permission:pfl'],function(){
        //Usuario
        Route::post('usuariosCrear', [UsuarioController::class, 'create']); 
        Route::post('usuariosListar', [UsuarioController::class, 'index']); //->middleware('permission:sa');
        Route::get('usuarioMostrar/{id}', [UsuarioController::class, 'show']);
        Route::post('usuariosActualizar', [UsuarioController::class, 'update']);
        Route::post('usuariosEliminar', [UsuarioController::class, 'destroy']);  
        Route::get('usuariosEditar/{id}', [UsuarioController::class, 'edit']); 
        Route::get('usuariosGenerarContrasena/{id}', [UsuarioController::class, 'generarContrasena']); 
        Route::get('usuariosInactivar/{id}', [UsuarioController::class, 'inactivar']);  
    }); 
    
    Route::get('usuarioHotel/{id}', [UsuarioController::class, 'usuarioHotel']); 


    Route::group(['middleware'=>'permission:rol'],function(){
        //Roles
        Route::post('rolListar', [RolController::class, 'index']);
        Route::post('rolCrear', [RolController::class, 'create']); 
        Route::get('rolMostrar/{id}', [RolController::class, 'show']); 
        Route::post('rolActualizar', [RolController::class, 'update']);
        Route::post('rolEliminar', [RolController::class, 'destroy']);
        Route::get('rolEditar/{id}', [RolController::class, 'edit']); 
    }); 

    Route::group(['middleware'=>'permission:prms'],function(){
        //Permisos 
        Route::post('permisoCrear', [PermisoController::class, 'create']); 
        Route::post('permisoActualizar', [PermisoController::class, 'update']); 
        Route::post('permisoEliminar', [PermisoController::class, 'destroy']); 
        Route::post('permisoListar', [PermisoController::class, 'index']); 
        Route::get('permisoMostrar/{id}', [PermisoController::class, 'show']); 
    }); 

    //Permisos detalle rol
    Route::post('permisoRolDetalleCrear', [RolPermisoDetalleController::class, 'create']); 

    Route::group(['middleware'=>'permission:clts'],function(){
        //Clientes
        Route::post('clientesCrear', [ClienteController::class, 'create']); 
        Route::post('clientesActualizar', [ClienteController::class, 'update']); 
        Route::post('clientesEliminar', [ClienteController::class, 'destroy']); 
        Route::post('clientesListar', [ClienteController::class, 'index']); 
        Route::get('clientesMostrar/{id}', [ClienteController::class, 'show']); 
        Route::get('clienteEditar/{id}', [ClienteController::class, 'edit']); 
    }); 

    Route::group(['middleware'=>'permission:hbs'],function(){ 
        //Habitaciones
        Route::post('habitacionesCrear', [HabitacionController::class, 'create']); 
        Route::post('habitacionesActualizar', [HabitacionController::class, 'update']); 
        Route::post('habitacionesEliminar', [HabitacionController::class, 'destroy']); 
        Route::post('habitacionesListar', [HabitacionController::class, 'index']); 
        Route::get('habitacionesMostrar/{id}', [HabitacionController::class, 'show']); 
        Route::get('habitacionesEditar/{id}', [HabitacionController::class, 'edit']); 
    }); 

    Route::post('habitacionesDashboard', [HabitacionController::class, 'listarHabitacionDashboard']); 
    Route::post('habitacionesDashboardPisos', [HabitacionController::class, 'listarHabitacionDashboardPisos']); 

    Route::group(['middleware'=>'permission:hbs'],function(){ 
        //Estado civil
        Route::post('estadoCivilListar', [EstadoCivilController::class, 'index']); 
    }); 

    Route::group(['middleware'=>'permission:ndest'],function(){ 
        //Nivel estudio
        Route::post('nivelDeEstudioListar', [NivelEstudioController::class, 'index']); 
    }); 

    Route::group(['middleware'=>'permission:gro'],function(){ 
        //genero
        Route::post('generoListar', [GeneroController::class, 'index']); 
    }); 

    Route::group(['middleware'=>'permission:tdoc'],function(){  
        //tipo_documento
        Route::post('tipoDocumentoListar', [TipoDocumentoController::class, 'index']); 
    });

    Route::group(['middleware'=>'permission:mdp'],function(){  
        //metodos pago
        Route::post('mediosPagoListar', [MetodosPagoController::class, 'index']); 
    });
    
    //pais
    Route::post('paisListar', [PaisController::class, 'index']); 

    //departamento
    Route::post('departamentoListar', [DepartamentoController::class, 'index']); 
    Route::post('departamentoPaisListar', [DepartamentoController::class, 'indexGetByPais']); 

    //ciudad
    Route::post('ciudadListar', [CiudadController::class, 'index']); 
    Route::post('ciudadDepartamentoListar', [CiudadController::class, 'indexGetByDepartamento']); 

    Route::group(['middleware'=>'permission:htl'],function(){  
        //Hotel
        Route::post('hotelCrear', [HotelController::class, 'create']); 
        Route::post('hotelListar', [HotelController::class, 'index']); 
        Route::get('hotelMostrar/{id}', [HotelController::class, 'show']); 
        Route::post('hotelEliminar', [HotelController::class, 'destroy']); 
        Route::post('hotelActualizar', [HotelController::class, 'update']); 
        Route::get('hotelEditar/{id}', [HotelController::class, 'edit']); 
    });


    Route::group(['middleware'=>'permission:pdto'],function(){
        //Producto
        Route::post('productoCrear', [ProductosController::class, 'create']); 
        Route::post('productoListar', [ProductosController::class, 'index']); 
        Route::get('productoMostrar/{id}', [ProductosController::class, 'show']); 
        Route::post('productoEliminar', [ProductosController::class, 'destroy']); 
        Route::post('productoActualizar', [ProductosController::class, 'update']); 
        Route::get('productoEditar/{id}', [ProductosController::class, 'edit']); 
    });

    Route::group(['middleware'=>'permission:inv'],function(){
        //Inventario
        Route::post('inventarioCrear', [InventarioController::class, 'create']); 
        Route::post('inventarioListar', [InventarioController::class, 'index']); 
        Route::get('inventarioMostrar/{id}', [InventarioController::class, 'show']); 
        Route::post('inventarioEliminar', [InventarioController::class, 'destroy']); 
        Route::post('inventarioActualizar', [InventarioController::class, 'update']); 
        Route::post('inventarioEditar/{id}', [InventarioController::class, 'edit']); 
    });
    
    //Accion ocupar habitacion
    Route::post('ocuparHabitacionCliente', [HabitacionController::class, 'ocupar']); 
    Route::post('desocuparHabitacionCliente', [HabitacionController::class, 'desocupar']); 

    //Tipo contribuyente
   // Route::post('tipoContribuyenteListar', [TipoContribuyenteController::class, 'index']); 
    
    Route::group(['middleware'=>'permission:thb'],function(){
        //Tipo Habitacion 
        Route::post('tipoHabitacionCrear', [TipoHabitacionController::class, 'create']); 
        Route::post('tipoHabitacionListar', [TipoHabitacionController::class, 'index']); 
        Route::get('tipoHabitacionMostrar/{id}', [TipoHabitacionController::class, 'show']); 
        Route::post('tipoHabitacionEliminar', [TipoHabitacionController::class, 'destroy']); 
        Route::post('tipoHabitacionActualizar', [TipoHabitacionController::class, 'update']); 
        Route::get('tipoHabitacionEditar/{id}', [TipoHabitacionController::class, 'edit']); 
    });

    Route::group(['middleware'=>'permission:cja'],function(){
        //Caja
        Route::post('cajaCrear', [CajaController::class, 'create']); 
        Route::post('cajaListar', [CajaController::class, 'index']); 
        Route::get('cajaMostrar/{id}', [CajaController::class, 'show']); 
        Route::post('cajaEliminar', [CajaController::class, 'destroy']); 
        Route::post('cajaActualizar', [CajaController::class, 'update']); 
        Route::get('cajaEditar/{id}', [CajaController::class, 'edit']); 
        Route::post('cajaAbir', [CajaController::class, 'abrirCaja']); 
        Route::post('cajaCerrar', [CajaController::class, 'cerrarCaja']); 
        Route::post('cajaRegistroAdicional', [CajaController::class, 'registroAdicionalCaja']); 
    });
    

    Route::group(['middleware'=>'permission:rcta'],function(){
        //Recetas
        Route::post('recetaCrear', [RecetaController::class, 'create']); 
        Route::post('recetaListar', [RecetaController::class, 'index']); 
        Route::get('recetaMostrar/{id}', [RecetaController::class, 'show']); 
        Route::post('recetaEliminar', [RecetaController::class, 'destroy']); 
        Route::get('recetaEditar/{id}', [RecetaController::class, 'edit']); 
        Route::post('recetaActualizar', [RecetaController::class, 'update']); 
    });

    Route::group(['middleware'=>'permission:umd'],function(){ 
        //Medidas
        Route::post('medidaListar', [MedidaController::class, 'index']);  
    });

    Route::group(['middleware'=>'permission:csmo'],function(){ 
        //Consumo
        Route::post('consumoCrear', [ConsumoController::class, 'create']);  
        Route::post('consumoListar', [ConsumoController::class, 'index']); 
        Route::get('consumoMostrar/{id}', [ConsumoController::class, 'show']); 
        Route::post('consumoEliminar', [ConsumoController::class, 'destroy']); 
    });

    Route::group(['middleware'=>'permission:ftn'],function(){ 
        //Facturar
        Route::post('facturaCrear', [FacturacionController::class, 'create']); 
        Route::post('facturaListar', [FacturacionController::class, 'index']); 
        Route::post('facturaAnular', [FacturacionController::class, 'destroy']); 
        Route::get('facturaPdf/{id}', [FacturacionController::class, 'facturaPdf']);  

    }); 

    Route::post('abonoCrear', [ControllerAbonos::class, 'create']); 
    Route::post('abonoListar', [ControllerAbonos::class, 'index']); 
    Route::post('abonoEliminar', [ControllerAbonos::class, 'destroy']); 

    Route::group(['middleware'=>'permission:sce'],function(){ 

        //secuencia externa
        Route::post('secuenciaExternaCrear', [SecuenciaExternaController::class, 'create']); 
        Route::post('secuenciaExternaListar', [SecuenciaExternaController::class, 'index']); 
        Route::get('secuenciaExternaMostrar/{id}', [SecuenciaExternaController::class, 'show']); 
        Route::post('secuenciaExternaEliminar', [SecuenciaExternaController::class, 'destroy']); 
        Route::get('secuenciaExternaEditar/{id}', [SecuenciaExternaController::class, 'edit']); 
        Route::post('secuenciaExternaActualizar', [SecuenciaExternaController::class, 'update']); 
    });

    Route::group(['middleware'=>'permission:sci'],function(){ 

        Route::post('secuenciaInternaCrear', [SecuenciaInternaController::class, 'create']); 
        Route::post('secuenciaInternaListar', [SecuenciaInternaController::class, 'index']); 
        Route::get('secuenciaInternaMostrar/{id}', [SecuenciaInternaController::class, 'show']); 
        Route::post('secuenciaInternaEliminar', [SecuenciaInternaController::class, 'destroy']); 
        Route::get('secuenciaInternaEditar/{id}', [SecuenciaInternaController::class, 'edit']); 
        Route::post('secuenciaInternaActualizar', [SecuenciaInternaController::class, 'update']); 
    });

    Route::post('getReservasHabitacionesCalendario', [DetalleHabitacionController::class, 'getReservasCalendario']); 
    Route::post('listatDetalleHabitaciones', [DetalleHabitacionController::class, 'index']); 
    Route::post('registrarReserva', [DetalleHabitacionController::class, 'index']);

    Route::get('logout', [AuthController::class, 'logout']);    
});

