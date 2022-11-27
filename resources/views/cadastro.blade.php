@extends('base')

@section('titulo', $titulo)

@section('conteudo')
    <style>
        .sombrinha {
            background: rgba(0, 0, 0, 0.8);
            border-radius: 5%;
            margin-top: 20% !important;
        }
    </style>
    <script>
        //PESQUISANDO ENDEREÇO PELO CEP

        function getDadosEnderecoPorCEP(cep) {
            let url = 'https://viacep.com.br/ws/' + cep + '/json/'

            let xmlHttp = new XMLHttpRequest()
            xmlHttp.open('GET', url)

            xmlHttp.onreadystatechange = () => {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                    let dadosJSONText = xmlHttp.responseText
                    let dadosJSONObj = JSON.parse(dadosJSONText)

                    document.getElementById('endereco').value = dadosJSONObj.logradouro
                    document.getElementById('bairro').value = dadosJSONObj.bairro
                    document.getElementById('cidade').value = dadosJSONObj.localidade
                    document.getElementById('uf').value = dadosJSONObj.uf
                    document.getElementById('complemento').value = dadosJSONObj.complemento

                }
            }

            xmlHttp.send()
        }
    </script>








    <div class="container p-5">
        <div class="card-body sombrinha">
            <form method="post" action={{ route('cadastro.store') }}>
                @csrf
                <h3 class="heading-small text-muted mb-4 text-center fill">Criar Conta</h3>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input name="name" value="{{ old('name') }}" type="text" placeholder="Nome"
                                    class="form-control">
                                <span
                                    class="text-white modal-sombra">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail"
                                    class="form-control">
                                <span
                                    class="text-white modal-sombra">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input name="password" type="password" placeholder="Senha" class="form-control">
                                <span
                                    class="text-white modal-sombra">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-lg-4">
                            <div class="form-group">
                                <input name="apelido" value="{{ old('apelido') }}" type="text"
                                    placeholder="Tipo de endereço, ex: Casa" class="form-control">
                                <span
                                    class="text-white modal-sombra">{{ $errors->has('apelido') ? $errors->first('apelido') : '' }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="cep" value="{{ old('cep') }}" type="text" placeholder="CEP"
                                    class="form-control" onMouseOut="getDadosEnderecoPorCEP(value)">
                                <span
                                    class="text-white modal-sombra">{{ $errors->has('cep') ? $errors->first('cep') : '' }}</span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input id="endereco" name="endereco" value="{{ old('endereco') }}" type="text"
                                    placeholder="Endereço" class="form-control">
                                <span
                                    class="text-white modal-sombra">{{ $errors->has('endereco') ? $errors->first('endereco') : '' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Address -->

                <div class="pl-lg-4">
                    <div class="row">

                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input id="complemento" name="complemento" value="{{ old('complemento') }}" type="text"
                                    placeholder="Complemento | Número" class="form-control">
                                <span
                                    class="text-white modal-sombra">{{ $errors->has('complemento') ? $errors->first('complemento') : '' }}</span>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input id="bairro" name="bairro" value="{{ old('bairro') }}" type="text"
                                    placeholder="Bairro" class="form-control">
                                <span
                                    class="text-white modal-sombra">{{ $errors->has('bairro') ? $errors->first('bairro') : '' }}</span>

                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input id="cidade" name="cidade" value="{{ old('cidade') }}" type="text"
                                    placeholder="Cidade" class="form-control">
                                <span
                                    class="text-white modal-sombra">{{ $errors->has('cidade') ? $errors->first('cidade') : '' }}</span>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input id="uf" name="estado" value="{{ old('estado') }}" type="text"
                                    placeholder="Estado" class="form-control">
                                <span
                                    class="text-white modal-sombra">{{ $errors->has('estado') ? $errors->first('estado') : '' }}</span>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-lg btn-info btn-block btn-roxo" type="submit">Criar Conta</button>
                </div>
            </form>
        </div>



    @endsection
