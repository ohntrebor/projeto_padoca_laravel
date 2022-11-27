<?php

namespace App\Http\Controllers;

use App\Models\LoginConta;
use App\Models\User;
use App\Models\Produto;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $erro = '';

        if ($request->get('erro') == 1) {
            $erro = 'Usuário e ou senha não existe';
        }

        if ($request->get('erro') == 2) {
            $erro = 'Necessário realizar login para ter acesso a página';
        }

        return view('login', ['titulo' => 'Login', 'erro' => $erro]);
    }



    public function autenticar(Request $request)
    {
        //regras de validação
        $regras = [
            'usuario' => 'required|email',
            'senha' => 'required'
        ];

        //as mensagens de feedback de validação
        $feedback = [
            'usuario.email' => 'Preencha o e-mail corretamente!',
            'usuario.required' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        //se não passar pelo validate
        $request->validate($regras, $feedback);

        //recuperamos os parâmetros do formulário
        $email = $request->get('usuario');
        $password = $request->get('senha');

        //iniciar o Model User
        $user = new User();

        $usuario = $user->where('email', $email)
            ->where('password', $password)
            ->get()
            ->first();




        if (isset($usuario->name)) {

            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;



            return redirect()->route('produtos.index');
        } else {
            return redirect()->route('login', ['erro' => 1]);
        }
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
     * @param  \App\Models\LoginConta  $loginConta
     * @return \Illuminate\Http\Response
     */
    public function show(LoginConta $loginConta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoginConta  $loginConta
     * @return \Illuminate\Http\Response
     */
    public function edit(LoginConta $loginConta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LoginConta  $loginConta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoginConta $loginConta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoginConta  $loginConta
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoginConta $loginConta)
    {
        session_destroy();
        return redirect()->route('home');
    }
}
