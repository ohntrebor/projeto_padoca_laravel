

@extends('base')

@section('titulo', 'Login')

@section('conteudo')


    <div class="container" style="margin-top: 3% !important">
        <div class="row">

            <div class="card-login">
                <div class="card">
                    <div class="card-header">
                        <h3 class="fill text-center">
                            Login Usuário
                         </h3>
                    </div>
                    <div class="card-body">
                        <form action={{ route('login') }} method="post">
                            @csrf

                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa-regular fa-at"></i></span>
                                    </div>
                                    <input name="usuario" value="{{ old('usuario') }}" type="text" placeholder="Usuário"
                                        class="form-control">
                                    <br>

                                </div>
                                <span
                                    class="text-white modal-sombra">{{ $errors->has('usuario') ? $errors->first('usuario') : '' }}</span>
                                <br>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                    </div>
                                    <input name="senha" type="password" placeholder="Senha" class="form-control">
                                    <br>

                                </div>
                                <span
                                    class="text-white modal-sombra">{{ $errors->has('senha') ? $errors->first('senha') : '' }}</span>

                            </div>



                            <button class="btn btn-lg btn-info btn-block btn-roxo" type="submit">Acessar</button>
                            <a href="{{ route('cadastro.index') }}" class="btn btn-lg btn-info btn-block btn-roxo">Criar
                                Conta</a>
                            <br>
                            <span class="text-white fill">{{ isset($erro) && $erro != '' ? $erro : '' }}</span>



                        </form>


                    </div>
                </div>
            </div>
        </div>

    @endsection
