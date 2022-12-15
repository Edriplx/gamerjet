<?php

namespace App\Http\Controllers;

use App\Models\horarios;
use App\Http\Requests\StorehorariosRequest;
use App\Http\Requests\UpdatehorariosRequest;

class HorariosController extends Controller
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
     * @param  \App\Http\Requests\StorehorariosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorehorariosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function show(horarios $horarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function edit(horarios $horarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatehorariosRequest  $request
     * @param  \App\Models\horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatehorariosRequest $request, horarios $horarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(horarios $horarios)
    {
        //
    }
}
