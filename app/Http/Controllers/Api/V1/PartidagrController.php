<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Partidagr;
use Illuminate\Http\Request;
use App\Http\Resources\V1\PartidagrResource;

class PartidagrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PartidagrResource::collection (Partidagr::select('videojuegos.nombre','equipos.nombre_equipo','partidagrs.tiempo_inicio','partidagrs.fecha','partidagrs.observacion')
        ->join('videojuegos','partidagrs.videojuego_id','=','videojuego_id')
        ->join('equipos','partidagrs.equipo_id','=','equipo_id')
        ->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Partidagr  $partidagr
     * @return \Illuminate\Http\Response
     */
    
    public function show(Partidagr $partidagr)
    {
        return new PartidagrResource($partidagr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Partidagr  $partidagr
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Partidagr $partidagr)
    {
        if( $partidagr->delete() ) { 
            return response()->json([ 
                'message' => 'Success'
            ], 204);
        }
        return response()->json([
            'message' => 'Not found'
        ],404);
    }
}
