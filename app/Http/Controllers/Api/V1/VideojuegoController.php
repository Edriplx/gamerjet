<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Videojuego;
use Illuminate\Http\Request;
use App\Http\Resources\V1\VideojuegoResource;

class VideojuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VideojuegoResource::collection(Videojuego::select('categorias.id','categorias.tipo','videojuegos.nombre','videojuegos.compania','videojuegos.precio','videojuegos.decripcion')
        ->join('categorias','videojuegos.categoria_id','=','categorias.id')
        ->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Videojuego  $videojuego
     * @return \Illuminate\Http\Response
     */
    
    public function show(Videojuego $videojuego)
    {
        return new VideojuegoResource($videojuego);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Videojuego  $videojuego
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Videojuego $videojuego)
    {
        if( $videojuego->delete() ) { 
            return response()->json([ 
                'message' => 'Success'
            ], 204);
        }
        return response()->json([
            'message' => 'Not found'
        ],404);
    }
}
