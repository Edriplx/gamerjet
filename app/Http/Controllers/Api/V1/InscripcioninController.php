<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Inscripcionin;
use Illuminate\Http\Request;
use App\Http\Resources\V1\InscripcioninResource;

class InscripcioninController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return InscripcioninResource::collection (Inscripcionin::select('videojuegos.compania','jugadores.nombre','inscripcionins.observacion')
        ->join('videojuegos','inscripcionins.videojuego_id','=','videojuego_id')
        ->join('jugadores','inscripcionins.jugador_id','=','jugador_id')
        ->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Inscripcionin  $inscripcionin
     * @return \Illuminate\Http\Response
     */
    
    public function show(Inscripcionin $inscripcionin)
    {
        return new InscripcioninResource($inscripcionin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Inscripcionin  $inscripcionin
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Inscripcionin $inscripcionin)
    {
        if( $inscripcionin->delete() ) { 
            return response()->json([ 
                'message' => 'Success'
            ], 204);
        }
        return response()->json([
            'message' => 'Not found'
        ],404);
    }
}
