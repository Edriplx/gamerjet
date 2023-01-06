<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Resources\V1\CategoriaResource;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CategoriaResource::collection (Categoria::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    
    public function show(Categoria $categoria)
    {
        return new CategoriaResource($categoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Categoria $categoria)
    {
        if( $categoria->delete() ) { 
            return response()->json([ 
                'message' => 'Success'
            ], 204);
        }
        return response()->json([
            'message' => 'Not found'
        ],404);
    }
}
