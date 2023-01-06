<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Partidain;
use Illuminate\Http\Request;
use App\Http\Resources\V1\PartidainResource;

class PartidainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PartidainResource::collection (Partidain::select('videojuegos.compania','jugadores.nombre','partidains.tiempo_inicio','partidains.fecha','partidains.observacion')
        ->join('videojuegos','partidains.videojuego_id','=','videojuego_id')
        ->join('jugadores','partidains.jugador_id','=','jugador_id')
        ->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Partidain  $partidain
     * @return \Illuminate\Http\Response
     */
    
    public function show(Partidain $partidain)
    {
        return new PartidainResource($partidain);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Partidain  $partidain
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Partidain $partidain)
    {
        if( $partidain->delete() ) { 
            return response()->json([ 
                'message' => 'Success'
            ], 204);
        }
        return response()->json([
            'message' => 'Not found'
        ],404);
    }
}
