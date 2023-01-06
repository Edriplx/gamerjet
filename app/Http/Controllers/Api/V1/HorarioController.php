<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Horario;
use Illuminate\Http\Request;
use App\Http\Resources\V1\HorarioResource;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HorarioResource::collection (Horario::select('videojuegos.nombre','aulas.nombre_aula','horarios.tiempo_inicio','horarios.tiempo_final','horarios.fecha','horarios.observacion')
        ->join('videojuegos','horarios.videojuego_id','=','videojuego_id')
        ->join('aulas','horarios.aula_id','=','aula_id')
        ->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    
    public function show(Horario $horario)
    {
        return new HorarioResource($horario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Horario $horario)
    {
        if( $horario->delete() ) { 
            return response()->json([ 
                'message' => 'Success'
            ], 204);
        }
        return response()->json([
            'message' => 'Not found'
        ],404);
    }
}
