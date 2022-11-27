<?php

namespace App\Http\Controllers;
use App\Models\Carrinho;
use App\Models\BaseConta;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = 0;
        return view('home', ['titulo' => 'Home']);
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
     * @param  \App\Models\BaseConta  $baseConta
     * @return \Illuminate\Http\Response
     */
    public function show(BaseConta $baseConta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BaseConta  $baseConta
     * @return \Illuminate\Http\Response
     */
    public function edit(BaseConta $baseConta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BaseConta  $baseConta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BaseConta $baseConta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BaseConta  $baseConta
     * @return \Illuminate\Http\Response
     */
    public function destroy(BaseConta $baseConta)
    {
        //
    }
}
