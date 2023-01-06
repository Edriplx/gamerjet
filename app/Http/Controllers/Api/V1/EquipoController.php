<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Equipo;
use Illuminate\Http\Request;
use App\Http\Resources\V1\EquipoResource;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EquipoResource::collection (Equipo::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    
    public function show(Equipo $equipo)
    {
        return new EquipoResource($equipo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Equipo $equipo)
    {
        if( $equipo->delete() ) { 
            return response()->json([ 
                'message' => 'Success'
            ], 204);
        }
        return response()->json([
            'message' => 'Not found'
        ],404);
    }
}
