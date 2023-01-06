<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Inscripciongr;
use Illuminate\Http\Request;
use App\Http\Resources\V1\InscripciongrResource;

class InscripciongrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return InscripciongrResource::collection (Inscripciongr::select('videojuegos.nombre','equipos.nombre_equipo','inscripciongrs.observacion')
        ->join('videojuegos','inscripciongrs.videojuego_id','=','videojuego_id')
        ->join('equipos','inscripciongrs.equipo_id','=','equipo_id')
        ->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Inscripciongr  $inscripciongr
     * @return \Illuminate\Http\Response
     */
    
    public function show(Inscripciongr $inscripciongr)
    {
        return new InscripciongrResource($inscripciongr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Inscripciongr  $inscripciongr
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Inscripciongr $inscripciongr)
    {
        if( $inscripciongr->delete() ) { 
            return response()->json([ 
                'message' => 'Success'
            ], 204);
        }
        return response()->json([
            'message' => 'Not found'
        ],404);
    }
}
