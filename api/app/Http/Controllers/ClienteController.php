<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\EstadoCivil;
use App\Models\Genero;
use App\Models\Historial;
use App\Models\Hotel;
use App\Models\NivelEstudio;
use App\Models\Pais;
use App\Models\TipoCliente;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon; 
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);
        $search = $request->query('search',false);

        $query = Cliente::with([
            'ciudad' => function ($query) {
                $query->select('id', 'nombre');
            },
            'tipoDocumento' => function ($query) {
                $query->select('id', 'nombre');
            },
            'genero' => function ($query) {
                $query->select('id', 'nombre');
            },
            'estadoCivil' => function ($query) {
                $query->select('id', 'nombre');
            },
            'hotel' => function ($query) {
                $query->select('id', 'nombre');
            }
        ])
        ->leftJoin ('ciudads','ciudads.id','clientes.ciudad_id')
        ->leftJoin ('tipo_documentos','tipo_documentos.id','clientes.tipo_documento_id')
        ->leftJoin ('generos','generos.id','clientes.genero_id')
        ->leftJoin ('hotels','hotels.id','clientes.hotel_id')
        ->select('clientes.*')
        ->where('clientes.estado',1)->orderBy('clientes.nombres', 'asc');

        if(!empty($search) && $search!=null){
            
            $query->where(function ($query) use ($search) { 
                $query->where('ciudads.nombre', 'like', "%{$search}%");   
                $query->orWhere('ciudads.codigo_dane', 'like', "%{$search}%");   
                $query->orWhere('tipo_documentos.nombre', 'like', "%{$search}%");   
                $query->orWhere('generos.nombre', 'like', "%{$search}%");   
                $query->orWhere('hotel.nombre', 'like', "%{$search}%");   
            }); 
            
        }

        return $per_page? $query->paginate($per_page) : $query->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nombres' => 'required|string|max:100|unique:clientes',
            'apellidos' => 'string|max:50', 
            'estado' => 'required|integer', 
            'tipo' => 'required|integer',
            'ciudad_id' => 'required|integer', 
            'tipo_documento' => 'required',
            'numero_documento' => 'required|string|max:15',
            'genero' => 'integer',
            'estado_civil' => 'integer',
            'barrio_residencia' => 'required|string|max:50',
            'fecha_nacimiento' => 'string', 
            'telefono' => 'required|string|max:30', 
            'celular' => 'required|string|max:30', 
            'nivel_estudio' => 'integer', 
            'correo' => 'required|string|max:50', 
            'observacion' => 'required|string|max:200',  
            'hotel_id' => 'required|integer',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $usuario = auth()->user();

        $Cliente = Cliente::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos?$request->apellidos:null,
            'estado' => $request->estado, 
            'tipo' => $request->tipo,
            'ciudad_id' => $request->ciudad_id,
            'tipo_documento_id' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento, 
            'genero_id' => $request->genero? $request->genero:null, 
            'estado_civil_id' => $request->estado_civil? $request->estado_civil:null, 
            'barrio_residencia' => $request->barrio_residencia, 
            'fecha_nacimiento' => $request->fecha_nacimiento?$request->fecha_nacimiento:null, 
            'telefono' => $request->telefono, 
            'celular' => $request->celular, 
            'nivel_studio_id' => $request->nivel_estudio?$request->nivel_estudio:null, 
            'correo' => $request->correo, 
            'observacion' => $request->observacion, 
            'usuario_create_id' => $usuario->id,
            'hotel_id' => $request->hotel_id,
        ]); 

        $json = [
            'asunto' => 'CLiente crear',
            'adjunto' => [
                'respuesta' => !empty($Cliente),
                'id' => $Cliente->id,
            ],
        ];


        Historial::insert([
            'tipo' => 4,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),         
        ]);

        if($Cliente){
            return response()
            ->json([
                'cliente' => $Cliente,
                'code' => "success"
            ], 201);
        } else {
            return response()->json(['error' => 'Erro al crear', 'code' => "error"], 404); 
        } 

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cliente = Cliente::where('estado',1)->find($id);

        if(!$cliente){
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }

        return $cliente;
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $cliente = Cliente::where('estado',1)->find($id);

        $pais = Pais::select('id','nombre','abreviatura')->Where('estado',1)->get();
        $tipo_documento = TipoDocumento::select('id','nombre')->Where('estado',1)->get();
        $genero = Genero::select('id','nombre')->Where('estado',1)->get();
        $estado_civil = EstadoCivil::select('id','nombre')->Where('estado',1)->get();
        $nivel_estudio = NivelEstudio::select('id','nombre')->Where('estado',1)->get();
        $hotel = Hotel::select('nombre','id')->where('estado','1')->get();
        $tipo = TipoCliente::select('nombre','id')->where('estado','1')->get();
        
        /*[
            [
                'id' => 1,
                'nombre' => 'Natural'
            ],
            [
                'id' => 2,
                'nombre' => 'Juridico'
            ]
        ];*/

        if(!$cliente){
            
            return [ 
                'pais' => $pais,
                'tipo_documento' => $tipo_documento,
                'genero' => $genero,
                'estado_civil' => $estado_civil,
                'nivel_estudio' => $nivel_estudio,
                'hotel' => $hotel,
                'tipo' => $tipo,
            ]; 
    
        } 

        return [
            'cliente' => $cliente,
            'pais' => $pais,
            'tipo_documento' => $tipo_documento,
            'genero' => $genero,
            'estado_civil' => $estado_civil,
            'nivel_estudio' => $nivel_estudio,
            'hotel' => $hotel,
            'tipo' => $tipo,
        ]; 

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nombres' => 'required|string|max:100|unique:clientes,nombres,' . $request->input('id'),
            'apellidos' => 'string|max:50', 
            'estado' => 'required|integer', 
            'tipo' => 'required|integer',
            'ciudad_id' => 'required|integer', 
            'tipo_documento' => 'required',
            'numero_documento' => 'required|string|max:15',
            'genero' => 'integer',
            'estado_civil' => 'integer',
            'barrio_residencia' => 'required|string|max:50',
            'fecha_nacimiento' => 'string', 
            'telefono' => 'required|string|max:30', 
            'celular' => 'required|string|max:30', 
            'nivel_estudio' => 'integer', 
            'correo' => 'required|string|max:50', 
            'observacion' => 'required|string|max:200',  
            'hotel_id' => 'required|integer',
            'id'  => 'required|integer',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $usuario = auth()->user(); 

        $filasActualizadas = Cliente::where('id', $request->id)
        ->update([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos, 
            'tipo' => $request->tipo,
            'ciudad_id' => $request->ciudad_id,
            'tipo_documento_id' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento, 
            'genero_id' => $request->genero, 
            'estado_civil_id' => $request->estado_civil, 
            'barrio_residencia' => $request->barrio_residencia, 
            'fecha_nacimiento' => $request->fecha_nacimiento, 
            'telefono' => $request->telefono, 
            'celular' => $request->celular, 
            'nivel_studio_id' => $request->nivel_estudio, 
            'correo' => $request->correo, 
            'observacion' => $request->observacion, 
            'hotel_id' => $request->hotel_id,
            'usuario_update_id' => $usuario->id, 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $json = [
            'asunto' => 'Actualizar cliente',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id,
            ],
        ];
        
        $usuario = auth()->user();

        Historial::insert([ 
            'tipo' => 4,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                     
        ]);

        if ($filasActualizadas > 0) {  
            // La actualización fue exitosa
            return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]);
        } else {
            // No se encontró un usuario con el ID proporcionado
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $filasActualizadas = Cliente::where('id', $request->id)
        ->update([ 
            'estado' => 0,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $json = [
            'asunto' => 'Eliminar cliente',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id,
            ],
        ];

        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 4,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,             
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),        
        ]);

        if ($filasActualizadas > 0) {
            // La actualización fue exitosa
            return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]);
        } else {
            // No se encontró un usuario con el ID proporcionado
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }
    }
}
