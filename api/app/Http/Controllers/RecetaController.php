<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Hotel;
use App\Models\Receta;
use App\Models\Recetas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;
class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);

        $query = Receta::where('estado',1)->orderBy('nombre', 'asc');

        return $per_page? $query->paginate($per_page) : $query->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'nombre' => 'required|string',
                'imagen' => 'image|mimes:jpeg,png,jpg',
                'descripcion' => 'required|string',
                'precio' => 'required|numeric',
                'hotel_id' => 'required|string',
                'estado' => 'required|integer',
            ], 
            [
                'nombre.required' => "El campo es requerio",
                'nombre.max' => "La cantidad maxima del campo es 50", 
                'descripcion.required' => "El campo es requerido",
                'descripcion.max' => "La cantidad maxima del campo es 100",
                'estado.required' => "El campo es requerido",
                'precio.required' => "El campo es requerido",
                'hotel_id.required' => "El campo es requerido",            
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        
        if(!empty($request->imagen)){
            $imagen = $request->file('imagen'); 

            $ruta = $imagen->store('public/imagenes/recetas');
    
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
            $path =  storage_path("app/public/config/default.png");
            $imagenData = base64_encode(file_get_contents($path)); 
        }

        $receta = Receta::create([
            'nombre' => $request->nombre,
            'imagen'=>!empty($request->imagen)?explode('/', $ruta)[3]:'default.png',
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'hotel_id' => $request->hotel_id,
            'estado' => $request->estado,
        ]);

        $json = [
            'asunto' => 'Receta Crear',
            'adjunto' => [
                'respuesta' =>!empty($receta),
                'id' => $receta->id,
            ],
        ];

        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 9,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,  
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                   
        ]);

        if($receta){ 
            $imagenData = str_replace("\u005C",'',$imagenData);
            return response()
            ->json([
                'receta' => $receta,
                'imagen' => $imagenData,
                'code' => "success"
            ], 201);
        } else {
            return response()->json(['error' => 'Erro al crear', 'code' => "error"], 404); 
        } 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $receta = Receta::where('estado',1)->find($id);
        
        if(!$receta){
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }

        return response()
        ->json([
            'receta' => $receta,
            'imagen' => $receta->imagen=='default.png'?str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/config/default.png")))):str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/imagenes/recetas/".$receta->imagen)))),
            'code' => "success"
        ], 201);
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $receta = Receta::where('estado',1)->find($id);
        
        $hotel = Hotel::select('nombre','id')->where('estado','1')->get();

        if(!$receta){
            return [
                'hotel' => $hotel,
            ]; 
        }

        
        return [
            'hotel' => $hotel,
            'receta' => $receta,
            'imagen' => $receta->imagen=='default.png'?str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/config/default.png")))):str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/imagenes/recetas/".$receta->imagen)))),
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nombre' => 'required|string',
            'imagen' => 'image|mimes:jpeg,png,jpg',
            'descripcion' => 'required|string',
            'precio' => 'required',
            'hotel_id' => 'required|string',
            'estado' => 'required|integer',
            'id' => 'required|integer', 
        ], 
        [
            'nombre.required' => "El campo es requerio",
            'nombre.max' => "La cantidad maxima del campo es 50", 
            'descripcion.required' => "El campo es requerido",
            'descripcion.max' => "La cantidad maxima del campo es 100",
            'estado.required' => "El campo es requerido",
            'precio.required' => "El campo es requerido",
            'hotel_id.required' => "El campo es requerido",    
            'id.required' => "El campo es requerido",                    
        ]    
    );

    if($validator->fails()){
        return response()->json($validator->errors());
    }

    if(!empty($request->imagen)){

        $imagen = $request->file('imagen'); 

        $ruta = $imagen->store('public/imagenes/recetas');

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
    } 


    $filasActualizadas = Receta::where('id', $request->id)
    ->update(
        [ 
            'nombre' => $request->nombre,
            'imagen'=>!empty($request->imagen)?explode('/', $ruta)[3]:'default.png',
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'hotel_id' => $request->hotel_id,
            'estado' => $request->estado,
        ]
    );

    $json = [
        'asunto' => 'Receta Actualizar',
        'adjunto' => [
            'respuesta' => !empty($filasActualizadas),
            'id' => $request->id,
        ],
    ];

    $usuario = auth()->user();
    
    Historial::insert([
        'tipo' => 9,
        'data_json' => json_encode($json),
        'usuario_id' => $usuario->id,  
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                   
    ]);

    if ($filasActualizadas > 0) {
        $receta = Receta::find($request->id);
        // La actualización fue exitosa
        return response()->json(['mensaje' => 'Actualización exitosa',            
        'imagen' => $receta->imagen=='default.png'?str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/config/default.png")))):str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/imagenes/recetas/".$receta->imagen)))),
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
        $filasActualizadas = Receta::where('id', $request->id)
        ->update([ 
            'estado' => 0,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $json = [
            'asunto' => 'Receta Eliminar',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id,
            ],
        ];
    
        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 9,
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
