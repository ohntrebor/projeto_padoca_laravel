<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cadastro;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cadastro', ['titulo' => 'Criar Conta']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $regras = [
            'name' => 'required|max:40',
            'email' => 'required|email|unique:users|max:40',
            'apelido' => 'required|max:50',
            'cep' => 'required|max:50',
            'endereco' => 'required|max:50',
            'complemento' => 'required|max:50',
            'bairro' => 'required|max:50',
            'cidade' => 'required|max:50',
            'estado' => 'required|max:40',
            'password' => 'required|max:20',
        ];

        $feedback = [
            'name.required' => 'Nome é obrigatório',
            'email.required' => 'E-mail é obrigatório',
            'apelido.required' => 'Tipo de Endereço é obrigatório',
            'cep.required' => 'CEP é obrigatório',
            'endereco.required' => 'Endereço é obrigatório',
            'complemento.required' => 'Complemento é obrigatório',
            'bairro.required' => 'Bairro é obrigatório',
            'cidade.required' => 'Cidade é obrigatório',
            'estado.required' => 'Estado é obrigatório',
            'password.required' => 'Senha é obrigatório',
            'email.unique' => 'Esse E-mail já existe!',
            'email.email' => 'Preencha o e-mail corretamente',

        ];

        $request->validate($regras,$feedback);

            User::create($request->all());
            return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cadastro  $cadastro
     * @return \Illuminate\Http\Response
     */
    public function show(Cadastro $cadastro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cadastro  $cadastro
     * @return \Illuminate\Http\Response
     */
    public function edit(Cadastro $cadastro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cadastro  $cadastro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cadastro  $cadastro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cadastro $cadastro)
    {
        //
    }
}
