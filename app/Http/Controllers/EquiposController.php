<?php

namespace App\Http\Controllers;

use App\Models\equipos;
use App\Http\Requests\StoreequiposRequest;
use App\Http\Requests\UpdateequiposRequest;

class EquiposController extends Controller
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
     * @param  \App\Http\Requests\StoreequiposRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreequiposRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function show(equipos $equipos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function edit(equipos $equipos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateequiposRequest  $request
     * @param  \App\Models\equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateequiposRequest $request, equipos $equipos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function destroy(equipos $equipos)
    {
        //
    }
}
