<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Medidas;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Imagine\Image\ImagineInterface;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);

        $query = Productos::where('estado',1)->orderBy('nombre', 'asc');

        return $per_page? $query->paginate($per_page) : $query->get();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'nombre' => 'required|string|max:50',
                'descripcion' => 'required|string|max:200', 
                'imagen' => 'image|mimes:jpeg,png,jpg,gif',
                'precio' => 'required',
                'cantidad' => 'required|integer',
                'estado' => 'required|integer',
                'inventario_id' => 'required|integer', 
                'limite_cantidad' =>  'required|integer', 
                'medida_id' => 'required|integer', 
            ], 
            [   'nombre.required' => "El campo es requerio",
                'nombre.max' => "La cantidad maxima del campo es 50", 
                'descripcion.required' => "El campo es requerido",
                'descripcion.max' => "La cantidad maxima del campo es 200", 
                'precio.required' =>  "El campo es requerido",
                'cantidad.required' =>  "El campo es requerido",
                'estado.required' =>  "El campo es requerido",
                'inventario_id.required' =>  "El campo es requerido",
                'limite_cantidad.required' =>  "El campo es requerido",
                'medida_id.required' =>  "El campo es requerido",

            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        if(!empty($request->imagen)){
            $imagen = $request->file('imagen'); 

            $ruta = $imagen->store('public/imagenes/productos');
    
            //$path =  "/app/storage/app/".$ruta;
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

            $imagenData = base64_encode(file_get_contents($path));

        } else {
            $path = storage_path('app/public/config/default.png'); //"/app/storage/app/public/config/default.png";
            
            $imagenData = base64_encode(file_get_contents($path)); 
        }


        $producto = Productos::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => !empty($request->imagen)?explode('/', $ruta)[3]:'default.png',
            'precio' => $request->precio,
            'cantidad' => $request->cantidad,
            'estado' => $request->estado,
            'inventario_id' => $request->inventario_id,
            'sin_limite_cantidad' => $request->limite_cantidad,
            'medida_id' => $request->medida_id
        ]);

        if($producto){ 
            $imagenData = str_replace("\u005C",'',$imagenData);
            return response()
            ->json([
                'producto' => $producto,
                'imagen' => $imagenData,
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
        $producto = Productos::where('estado',1)->find($id);
        
        if(!$producto){
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }

        return response()
        ->json([
            'producto' => $producto,
            'imagen' => $producto->imagen=='default.png'?str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/config/default.png")))):str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/imagenes/productos/".$producto->imagen)))),
            'code' => "success"
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nombre' => 'required|string|max:50',
            'descripcion' => 'required|string|max:200', 
            'imagen' => 'image|mimes:jpeg,png,jpg,gif',
            'precio' => 'required',
            'cantidad' => 'required|integer',
            'estado' => 'required|integer',
            'inventario_id' => 'required|integer', 
            'limite_cantidad' =>  'required|integer', 
            'medida_id' => 'required|integer', 
            'id' => 'required|integer', 
        ], 
        [   'nombre.required' => "El campo es requerio",
            'nombre.max' => "La cantidad maxima del campo es 50", 
            'descripcion.required' => "El campo es requerido",
            'descripcion.max' => "La cantidad maxima del campo es 200", 
            'precio.required' =>  "El campo es requerido",
            'cantidad.required' =>  "El campo es requerido",
            'estado.required' =>  "El campo es requerido",
            'inventario_id.required' =>  "El campo es requerido",
            'limite_cantidad.required' =>  "El campo es requerido",
            'medida_id.required' =>  "El campo es requerido",
            'id.required' =>  "El campo es requerido", 
        ]    
    );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $insert = [
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => 'default.png',
            'precio' => $request->precio,
            'cantidad' => $request->cantidad,
            'estado' => $request->estado,
            'inventario_id' => $request->inventario_id,
            'sin_limite_cantidad' => $request->limite_cantidad,
            'medida_id' => $request->medida_id
        ];

        if(!empty($request->imagen)){

            $imagen = $request->file('imagen'); 

            $ruta = $imagen->store('public/imagenes/productos');
    
            $path = storage_path('app/'.$ruta);
    
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
                'descripcion' => $request->descripcion,
                'imagen' => explode('/', $ruta)[3],
                'precio' => $request->precio,
                'cantidad' => $request->cantidad,
                'estado' => $request->estado,
                'inventario_id' => $request->inventario_id,
                'sin_limite_cantidad' => $request->limite_cantidad,
                'medida_id' => $request->medida_id
            ];
        } 

        $filasActualizadas = Productos::where('id', $request->id)
        ->update(
            $insert 
        );

        if ($filasActualizadas > 0) {
            $producto = Productos::find($request->id);
            // La actualización fue exitosa
            return response()->json(['mensaje' => 'Actualización exitosa',            
            'imagen' => $producto->imagen=='default.png'?str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/config/default.png")))):str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/imagenes/productos/".$producto->imagen)))),
            'code' => "success"]);
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
        $filasActualizadas = Productos::where('id', $request->id)
        ->update([ 
            'estado' => 0,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        if ($filasActualizadas > 0) {
            // La actualización fue exitosa
            return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]);
        } else {
            // No se encontró un usuario con el ID proporcionado
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }
    }

    public function edit($id) {
        
        $producto = Productos::where('estado',1)->find($id);
        
        if(!$producto){
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }

        $medida = Medidas::select('id','nombre')->Where('estado',1)->get();
        $inventario = Inventario::select('id','nombre')->Where('estado',1)->get();

        return response()
        ->json([
            'medida' => $medida,
            'inventario' => $inventario,
            'producto' => $producto,
            'imagen' => $producto->imagen=='default.png'?str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/config/default.png")))):str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/imagenes/productos/".$producto->imagen)))),
            'code' => "success"
        ], 201);

    }
}
