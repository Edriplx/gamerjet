<?php

namespace App\Http\Controllers;

use App\Models\videojuegos;
use App\Http\Requests\StorevideojuegosRequest;
use App\Http\Requests\UpdatevideojuegosRequest;

class VideojuegosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorevideojuegosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorevideojuegosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\videojuegos  $videojuegos
     * @return \Illuminate\Http\Response
     */
    public function show(videojuegos $videojuegos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\videojuegos  $videojuegos
     * @return \Illuminate\Http\Response
     */
    public function edit(videojuegos $videojuegos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatevideojuegosRequest  $request
     * @param  \App\Models\videojuegos  $videojuegos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatevideojuegosRequest $request, videojuegos $videojuegos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\videojuegos  $videojuegos
     * @return \Illuminate\Http\Response
     */
    public function destroy(videojuegos $videojuegos)
    {
        //
    }
}
