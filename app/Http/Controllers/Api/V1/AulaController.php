<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Aula;
use Illuminate\Http\Request;
use App\Http\Resources\V1\AulaResource;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AulaResource::collection (Aula::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Aula  $aula
     * @return \Illuminate\Http\Response
     */
    
    public function show(Aula $aula)
    {
        return new AulaResource($aula);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Aula  $aula
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Aula $aula)
    {
        if( $aula->delete() ) { 
            return response()->json([ 
                'message' => 'Success'
            ], 204);
        }
        return response()->json([
            'message' => 'Not found'
        ],404);
    }
}
