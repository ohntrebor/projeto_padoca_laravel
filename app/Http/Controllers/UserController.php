<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('email', $_SESSION['email'])->get();

        return view('privado.perfil', ['titulo' => 'Carrinho de Compras', 'user' => $user]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $regras = [
            'name' => 'required|max:40',
            'apelido' => 'required|max:50',
            'cep' => 'required|max:50',
            'endereco' => 'required|max:50',
            'complemento' => 'required|max:50',
            'bairro' => 'required|max:50',
            'cidade' => 'required|max:50',
            'estado' => 'required|max:40',
        ];

        $feedback = [
            'name.required' => 'Campo obrigatório',
            'apelido.required' => 'Campo obrigatório',
            'cep.required' => 'Campo obrigatório',
            'endereco.required' => 'Campo obrigatório',
            'complemento.required' => 'Campo obrigatório',
            'bairro.required' => 'Campo obrigatório',
            'cidade.required' => 'Campo obrigatório',
            'estado.required' => 'Campo obrigatório',
        ];

        $request->validate($regras,$feedback);

        User::findOrFail($request->id)->update($request->all());

        return redirect('user')->with('msg', 'Dados Atualizados com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
