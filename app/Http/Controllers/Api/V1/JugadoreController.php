<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Jugadore;
use Illuminate\Http\Request;
use App\Http\Resources\V1\JugadoreResource;

class JugadoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return JugadoreResource::collection (Jugadore::select('equipos.id','jugadores.nombre','jugadores.cedula','jugadores.telefono','jugadores.correo','equipos.nombre_equipo','jugadores.observacion')
        ->join('equipos','jugadores.equipo_id','=','equipos.id')
        ->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Jugadore  $jugadore
     * @return \Illuminate\Http\Response
     */
    
    public function show(Jugadore $jugadore)
    {
        return new JugadoreResource($jugadore);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Jugadore  $jugadore
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Jugadore $jugadore)
    {
        if( $jugadore->delete() ) { 
            return response()->json([ 
                'message' => 'Success'
            ], 204);
        }
        return response()->json([
            'message' => 'Not found'
        ],404);
    }
}

