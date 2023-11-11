<?php

namespace App\Http\Controllers;

use App\Models\RolPermisoDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;

class RolPermisoDetalleController extends Controller
{
    public function create(Request $request) {

        $validator = Validator::make($request->all(),[
            'rol_id' => 'required|integer',
            'permiso_id' => 'required|integer',
        ], 
        [
            'rol_id.required' => "El campo es requerio", 
            'permiso_id.required' => "El campo es requerio", 
        ]);    

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $rolPermiso = RolPermisoDetalle::create([
            'rol_id' => $request->rol_id,
            'permiso_id' => $request->permiso_id,
        ]);

        if($rolPermiso){
            return response()
            ->json([
                'rolPermiso' => $rolPermiso,
                'code' => "success"
            ], 201);
        } else {
            return response()->json(['error' => 'Erro al crear', 'code' => "error"], 404); 
        }

    }
}
