<?php

namespace App\Http\Controllers;

use App\Models\aulas;
use App\Http\Requests\StoreaulasRequest;
use App\Http\Requests\UpdateaulasRequest;

class AulasController extends Controller
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
     * @param  \App\Http\Requests\StoreaulasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreaulasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\aulas  $aulas
     * @return \Illuminate\Http\Response
     */
    public function show(aulas $aulas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\aulas  $aulas
     * @return \Illuminate\Http\Response
     */
    public function edit(aulas $aulas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateaulasRequest  $request
     * @param  \App\Models\aulas  $aulas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateaulasRequest $request, aulas $aulas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\aulas  $aulas
     * @return \Illuminate\Http\Response
     */
    public function destroy(aulas $aulas)
    {
        //
    }
}
