<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Hotel;
use App\Models\Pais;
use App\Models\TiposContribuyentes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;
class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);

        $query = Hotel::with(['ciudad' => function ($query) {
            $query->select('id','nombre');
        },
        'tipoContribuyente'=> function ($query) {
            $query->select('id','nombre');
        },]) 
        ->where('estado',1)->orderBy('nombre', 'asc');

        return $per_page? $query->paginate($per_page) : $query->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'nombre' => 'required|string|max:50|unique:hotels',
                'direccion' => 'required|string', 
                'ciudad_id' => 'required|integer',
                'contacto' => 'required|string', 
                'contacto_telefono' => 'required|string',
                'contacto_cargo' => 'required|string', 
                'telefono' => 'required|string',
                'nit' => 'required|string',
                'razon_social' => 'required|string',
                'cantidad_habitaciones' => 'required|integer',
                'email' => 'required|string|email|max:50|unique:hotels',
                'tipo_contribuyente' => 'required|integer',
                'usuario_id'  => 'required|integer',
            ], 
            [
                'nombre.required' => "El campo es requerio",
                'nombre.max' => "La cantidad maxima del campo es 50",
                'nombre.unique' =>  "El nombre ya existe",
                'direccion.required' => "El campo es requerio",
                'ciudad_id.required' => "El campo es requerio",
                'contacto.required' => "El campo es requerio",
                'contacto_telefono.required' => "El campo es requerio",
                'contacto_cargo.required' => "El campo es requerio",
                'nit.required' => "El campo es requerio",
                'telefono.required' => "El campo es requerio",
                'razon_social.required' => "El campo es requerio",
                'cantidad_habitaciones.required' => "El campo es requerio",
                'email.required' => "El campo es requerio",
                'email.max' =>  "La cantidad maxima del campo es 50",
                'tipo_contribuyente.required'=>  "El campo es requerio",
                'usuario_id.required' =>  "El campo es requerio",
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        if(!empty($request->imagen)){
            $imagen = $request->file('imagen'); 

            $ruta = $imagen->store('public/imagenes/hoteles');
    
            $path =  storage_path('app/'.$ruta);
    
            // Carga la imagen original
            $imagine = new Imagine();
            $image = $imagine->open($path);
    
            $newWidth = 300;
    
            // Calcula la nueva altura manteniendo la relación de aspecto original
            $ratio = $image->getSize()->getWidth() / $image->getSize()->getHeight();
            $newHeight = intval($newWidth / $ratio);
            
            // Redimensiona la imagen
            $resizedImage = $image->resize(new Box($newWidth, $newHeight));
    
            // Guarda la imagen redimensionada
            $resizedImage->save($path);

            $imagenData = base64_encode(file_get_contents($path));

        } else {
            $path = storage_path("app/public/config/defaultHotel.jpg");
            $imagenData = base64_encode(file_get_contents($path)); 
        }



        $hotel = Hotel::create([
            'nombre' => $request->nombre, 
            'direccion' => $request-> direccion,
            'ciudad_id' => $request-> ciudad_id,
            'contacto' => $request-> contacto,
            'contacto_telefono' => $request-> contacto_telefono,
            'contacto_cargo' => $request->contacto_cargo,
            'telefono' => $request->telefono,
            'nit' =>  $request->nit,
            'razon_social' => $request->razon_social,
            'cantidad_habitaciones' =>  $request->cantidad_habitaciones,
            'email' => $request->email,
            'tipo_contribuyente' => $request->tipo_contribuyente,
            'usuario_id' => $request->usuario_id,
            'estado' => '1',
            'imagen' => !empty($request->imagen)?explode('/', $ruta)[3]:'defaultHotel.jpg',
        ]); 


        $json = [
            'asunto' => 'Hotel Crear',
            'adjunto' => [
                'respuesta' => !empty($hotel),
                'id' => $hotel->id,
            ],
        ];

        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 5,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,       
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),              
        ]);

        if($hotel){
            return response()
            ->json([
                'hotel' => $hotel,
                'code' => "success",
                'imagen' => str_replace("\u005C",'',$imagenData),
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
        $hotel = Hotel::where('estado',1)->find($id);

        if(!$hotel){
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }

        return response()
        ->json([
            'hotel' => $hotel,
            'imagen' => $hotel->imagen=='defaultHotel.jpg'?str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/config/defaultHotel.jpg")))):str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/imagenes/hoteles/".$hotel->imagen)))),
            'code' => "success"
        ], 201);
    } 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:50|unique:hotels,nombre,' . $request->input('id'),
            'direccion' => 'required|string',
            'ciudad_id' => 'required|integer',
            'contacto' => 'required|string',
            'contacto_telefono' => 'required|string',
            'contacto_cargo' => 'required|string',
            'telefono' => 'required|string',
            'nit' => 'required|string',
            'razon_social' => 'required|string',
            'cantidad_habitaciones' => 'required|integer',
            'email' => 'required|string|email|max:50|unique:hotels,email,' . $request->input('id'),
            'tipo_contribuyente' => 'required|integer',
            'usuario_id' => 'required|integer',
            'id' => 'required|integer',
        ], [
            'nombre.required' => "El campo es requerido",
            'nombre.max' => "La cantidad máxima del campo es 50",
            'nombre.unique' => "El nombre ya existe",
            'direccion.required' => "El campo es requerido",
            'ciudad_id.required' => "El campo es requerido",
            'contacto.required' => "El campo es requerido",
            'contacto_telefono.required' => "El campo es requerido",
            'contacto_cargo.required' => "El campo es requerido",
            'nit.required' => "El campo es requerido",
            'telefono.required' => "El campo es requerido",
            'razon_social.required' => "El campo es requerido",
            'cantidad_habitaciones.required' => "El campo es requerido",
            'email.required' => "El campo es requerido",
            'email.max' => "La cantidad máxima del campo es 50",
            'tipo_contribuyente.required' => "El campo es requerido",
            'usuario_id.required' => "El campo es requerido",
            'id.required' => "El campo es requerido",
        ]);
        

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $insert = [
            'nombre' => $request->nombre, 
            'direccion' => $request-> direccion,
            'ciudad_id' => $request-> ciudad_id,
            'contacto' => $request-> contacto,
            'contacto_telefono' => $request-> contacto_telefono,
            'contacto_cargo' => $request->contacto_cargo,
            'telefono' => $request->telefono,
            'nit' =>  $request->nit,
            'razon_social' => $request->razon_social,
            'cantidad_habitaciones' =>  $request->cantidad_habitaciones,
            'email' => $request->email,
            'tipo_contribuyente' => $request->tipo_contribuyente,
            'usuario_id' => $request->usuario_id,  
            'imagen' => 'defaultHotel.jpg', 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ];

        if(!empty($request->imagen)){

            $imagen = $request->file('imagen'); 

            $ruta = $imagen->store('public/imagenes/hoteles');
    
            $path =  storage_path('app/'.$ruta);
    
            // Carga la imagen original
            $imagine = new Imagine();
            $image = $imagine->open($path);
    
            $newWidth = 200;
    
            // Calcula la nueva altura manteniendo la relación de aspecto original
            $ratio = $image->getSize()->getWidth() / $image->getSize()->getHeight();
            $newHeight = intval($newWidth / $ratio);
            
            // Redimensiona la imagen
            $resizedImage = $image->resize(new Box($newWidth, $newHeight));
    
            // Guarda la imagen redimensionada
            $resizedImage->save($path);

           // $imagenData = base64_encode(file_get_contents($path)); 

            $insert = [
                'nombre' => $request->nombre, 
                'direccion' => $request-> direccion,
                'ciudad_id' => $request-> ciudad_id,
                'contacto' => $request-> contacto,
                'contacto_telefono' => $request-> contacto_telefono,
                'contacto_cargo' => $request->contacto_cargo,
                'telefono' => $request->telefono,
                'nit' =>  $request->nit,
                'razon_social' => $request->razon_social,
                'cantidad_habitaciones' =>  $request->cantidad_habitaciones,
                'email' => $request->email,
                'tipo_contribuyente' => $request->tipo_contribuyente,
                'usuario_id' => $request->usuario_id, 
                'imagen' => explode('/', $ruta)[3],
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        } 

        $filasActualizadas = Hotel::where('id', $request->id)
        ->update($insert); 
        
        $json = [
            'asunto' => 'Hotel Actualizar',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id,
            ],
        ];

        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 5,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                    
        ]);

        if ($filasActualizadas > 0) {
            $hotel = Hotel::where('estado',1)->find($request->id);

            return response()->json(['mensaje' => 'Actualización exitosa',
            'imagen' => $hotel->imagen=='defaultHotel.jpg'?str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/config/defaultHotel.jpg")))):str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/imagenes/hoteles/".$hotel->imagen)))),
            'code' => "success"]);
        } else {
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }
    
    }
    /**
    * Show the form for editing the specified resource.
    */
    public function edit($id)
    { 
        $hotel = Hotel::where('estado',1)->find($id);

        $pais = Pais::select('id','nombre','abreviatura')->Where('estado',1)->get();
        $tipoContribuyente = TiposContribuyentes::select('id','nombre')->Where('estado',1)->get();

        if(!$hotel){

            return response()
            ->json([ 
                'pais' => $pais,
                'tipoContribuyente' => $tipoContribuyente,
                'code' => "success",
            ], 201);        
        } 

        return response()
        ->json([
            'hotel' => $hotel,
            'imagen' => $hotel->imagen=='defaultHotel.jpg'?str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/config/defaultHotel.jpg")))):str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/imagenes/hoteles/".$hotel->imagen)))),
            'pais' => $pais,
            'tipoContribuyente' => $tipoContribuyente,
            'code' => "success",
        ], 201);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $filasActualizadas = Hotel::where('id', $request->id)
        ->update([ 
            'estado' => 0,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

                
        $json = [
            'asunto' => 'Hotel Eliminar',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id,
            ],
        ];

        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 5,
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
