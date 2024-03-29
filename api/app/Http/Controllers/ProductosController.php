<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Inventario;
use App\Models\Medidas;
use App\Models\ProductoDetalle;
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
        $search = $request->query('search',false);

        $query = Productos::with(['inventario' => function ($query)  {
            $query->select('id','nombre');
        },
        'medida' => function ($query)  {
            $query->select('id','nombre');
        }
        ]) 
        ->join('inventarios','inventarios.id', 'productos.inventario_id')
        ->join('medidas','medidas.id', 'productos.medida_id')
        ->select('productos.*')
        ->where('productos.estado',1)
        ->orderBy('productos.id', 'desc');

        if(!empty($search) && $search!=null){  
            
            $query->where(function ($query) use ($search) { 
                $query->orWhere('productos.nombre', 'like', "%{$search}%"); 
                $query->orWhere('productos.cantidad', 'like', "%{$search}%"); 
                $query->orWhere('productos.precio', 'like', "%{$search}%");   
                $query->orWhere('inventarios.nombre', 'like', "%{$search}%");   
                $query->orWhere('medidas.nombre', 'like', "%{$search}%");    
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
                'nombre' => 'required|string|max:50',
                'descripcion' => 'required|string|max:200', 
                'imagen' => 'image|mimes:jpeg,png,jpg,gif',
                'precio' => 'required|integer',
                'cantidad' => 'required|integer',
                'estado' => 'required|integer',
                'inventario_id' => 'required|integer', 
                'limite_cantidad' =>  'required|integer', 
                'medida_id' => 'required|integer', 
                'stop_minimo' => 'required|integer', 
                'precio_base' => 'required|integer', 
                'tipo_producto' => 'required|integer', 
                'visible_receta' => 'required|integer', 
                'visible_venta' => 'required|integer', 
            ], 
            [  
                'nombre.required' => "El campo es requerio",
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

        if( $request->tipo_producto == 2){
            $medida_id = 4; 
        } else {
            $medida_id = $request->medida_id;
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
            'medida_id' => $medida_id,
            'stop_minimo' => $request->stop_minimo, 
            'tipo_producto' => $request->tipo_producto,
            'precio_base' => $request->precio_base,
            'visible_venta' => $request->visible_venta,
            'visible_receta' => $request->visible_receta, 
        ]);

        $json = [
            'asunto' => 'Producto Crear',
            'adjunto' => [
                'respuesta' => !empty($producto),
                'id' => $producto->id,
            ],
        ];

        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 8,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,     
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                
        ]);

        if($producto){ 
            $imagenData = str_replace("\u005C",'',$imagenData);

            ProductoDetalle::create([
                'producto_id' => $producto->id,
                'cantidad' => $request->cantidad,
                'estado' => 2,
            ]);

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
            //'cantidad' => 'required|integer',
            'estado' => 'required|integer',
            'inventario_id' => 'required|integer', 
            'limite_cantidad' =>  'required|integer', 
            'medida_id' => 'required|integer', 
            'id' => 'required|integer', 
            'stop_minimo' => 'required|integer', 
            'precio_base' => 'required', 
            'tipo_producto' => 'required|integer', 
            'visible_venta' => 'required|integer',
            'visible_receta' => 'required|integer', 
        ], 
        [   'nombre.required' => "El campo es requerio",
            'nombre.max' => "La cantidad maxima del campo es 50", 
            'descripcion.required' => "El campo es requerido",
            'descripcion.max' => "La cantidad maxima del campo es 200", 
            'precio.required' =>  "El campo es requerido",
          //  'cantidad.required' =>  "El campo es requerido",
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
        if( $request->tipo_producto == 2){
            $medida_id = 4; 
        } else {
            $medida_id = $request->medida_id;
        }

        $insert = [
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => 'default.png',
            'precio' => $request->precio,
           // 'cantidad' => $request->cantidad,
            'estado' => $request->estado,
            'inventario_id' => $request->inventario_id,
            'sin_limite_cantidad' => $request->limite_cantidad,
            'medida_id' => $medida_id,
            'stop_minimo' => $request->stop_minimo, 
            'tipo_producto' => $request->tipo_producto,
            'precio_base' => $request->precio_base,
            'visible_venta' => $request->visible_venta,
            'visible_receta' => $request->visible_receta, 
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
                'estado' => $request->estado,
                'inventario_id' => $request->inventario_id,
                'sin_limite_cantidad' => $request->limite_cantidad,
                'medida_id' => $medida_id,
                'stop_minimo' => $request->stop_minimo, 
                'tipo_producto' => $request->tipo_producto,
                'precio_base' => $request->precio_base,
                'visible_venta' => $request->visible_venta,
                'visible_receta' => $request->visible_receta,  
            ];
        } 

        $filasActualizadas = Productos::where('id', $request->id)
        ->update(
            $insert 
        );

        $json = [
            'asunto' => 'Producto Actualizar',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id,
            ],
        ];

        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 8,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,    
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                 
        ]);

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

        $json = [
            'asunto' => 'Producto Eliminar',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id,
            ],
        ];

        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 8,
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

    public function edit($id) {
        
        $producto = Productos::where('estado',1)->find($id); 

        $medida = Medidas::select('id','nombre')->Where('estado',1)->get();
        $inventario = Inventario::select('id','nombre')->Where('estado',1)->get();

        $visible = [
            [
                'id' => 1,
                'nombre' => 'Si'
            ],
            [
                'id' => 0,
                'nombre' => 'No'
            ]
        ];

        $visible_receta = [
            [
                'id' => 1,
                'nombre' => 'Si'
            ],
            [
                'id' => 0,
                'nombre' => 'No'
            ]
        ];


        $sin_limite = [
            [
                'id' => 1,
                'nombre' => 'Si'
            ],
            [
                'id' => 0,
                'nombre' => 'No'
            ]
        ];

        $tipo = [
            [
                'id' => 1,
                'nombre' => 'Producto'
            ],
            [
                'id' => 2,
                'nombre' => 'Servicio'
            ]
        ];
        if(!$producto){



            return response()
            ->json([ 
                'inventario' => $inventario, 
                'medida' => $medida,
                'visible_venta' => $visible,
                'sin_limite' => $sin_limite,
                'imagen' => str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/config/default.png")))),
                'tipo' => $tipo,
                'visible_receta' => $visible_receta,
                'code' => "success"
            ], 201);
        }


        return response()
        ->json([
            'medida' => $medida,
            'inventario' => $inventario,
            'producto' => $producto,
            'visible_venta' => $visible,
            'visible_receta' => $visible_receta,
            'sin_limite' => $sin_limite,
            'tipo' => $tipo,
            'imagen' => $producto->imagen=='default.png'?str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/config/default.png")))):str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/imagenes/productos/".$producto->imagen)))),
            'code' => "success"
        ], 201);

    }
}
