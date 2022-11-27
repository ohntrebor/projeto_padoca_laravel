<?php

namespace App\Http\Controllers;

use App\Models\Privado;
use Illuminate\Http\Request;

class PrivadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('privado.produtos', ['titulo' => 'produtos']);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Privado  $privado
     * @return \Illuminate\Http\Response
     */
    public function show(Privado $privado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Privado  $privado
     * @return \Illuminate\Http\Response
     */
    public function edit(Privado $privado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Privado  $privado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Privado $privado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Privado  $privado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Privado $privado)
    {
        //
    }
}
