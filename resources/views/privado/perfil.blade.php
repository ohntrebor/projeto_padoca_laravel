@extends('privado.base')

@section('titulo', 'Perfil')


@section('conteudo')

    <?php
    use App\Models\Carrinho;
    use App\Models\Pedido;


    $qtd = Carrinho::where('user_email', $_SESSION['email'])->count();
    $pedidos = Pedido::where('user_email', $_SESSION['email'])->count();

    $nome_da_padaria = 'Bakery';
    ?>

    <br><br><br>

    <style>
        #att:hover {
            color: white;
            background: #4fd69c;
            width: 100% !important;
        }

        input:hover {
            border: solid 2px !important;
            border-color: rgb(204, 169, 118) !important;

        }
    </style>

    <!-- Page content -->
    <div class="container-fluid mt--5">
        <div class="row">

            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-0">
                                    <div>

                                        <span class="heading">{{ $pedidos}}</span>
                                        <i class="fa-sharp fa-solid fa-bag-shopping"></i> <span class="description">Pedidos</span>
                                    </div>

                                    <div>


                                        <span class="heading">{{ $qtd }}</span>
                                        <i class="fa-solid fa-cart-shopping-fast"></i> <span class="description">Carrinho</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ $user[0]['name'] }}<span class="font-weight-light"></span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ $user[0]['cidade'] }}, Brasil
                            </div>

                            <hr class="my-4" />
                            <p>Data de Cadastro</p>
                            <span>{{ $user[0]['created_at']->format('d/m/Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Meus Dados</h3>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('att', $user[0]['id']) }}" method="post">
                            @csrf
                            @method('PUT')
                            <h6 class="heading-small text-muted mb-4">Informações Pessoais</h6>
                            <div class="pl-lg-4">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">E-mail</label>
                                            <input type="email" id="input-email"
                                                class="form-control form-control-alternative"
                                                placeholder="{{ $user[0]['email'] }}" value="{{ $user[0]['email'] }}"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Nome Completo</label>
                                            <input type="text" id="input-first-name" name="name"
                                                class="form-control form-control-alternative"
                                                placeholder="{{ $user[0]['name'] }}" value="{{ $user[0]['name'] }}">
                                            <span
                                                class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr class="my-4" />
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Endereço</h6>
                            <div class="pl-lg-4">


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Nome Residência</label>
                                            <input id="input-address" class="form-control form-control-alternative"
                                                placeholder="{{ $user[0]['apelido'] }}" value="{{ $user[0]['apelido'] }}"
                                                type="text" name="apelido">
                                            <span
                                                class="text-danger">{{ $errors->has('apelido') ? $errors->first('apelido') : '' }}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">CEP</label>
                                            <input id="input-address" class="form-control form-control-alternative"
                                                placeholder="{{ $user[0]['cep'] }}" value="{{ $user[0]['cep'] }}"
                                                type="text" name="cep">
                                            <span
                                                class="text-danger">{{ $errors->has('cep') ? $errors->first('cep') : '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Rua</label>
                                            <input id="input-address" class="form-control form-control-alternative"
                                                placeholder="{{ $user[0]['endereco'] }}"
                                                value="{{ $user[0]['endereco'] }}" type="text" name="endereco">
                                            <span
                                                class="text-danger">{{ $errors->has('endereco') ? $errors->first('endereco') : '' }}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Complemento</label>
                                            <input id="complemento" class="form-control form-control-alternative"
                                                placeholder="{{ $user[0]['complemento'] }}"
                                                value="{{ $user[0]['complemento'] }}" type="text" name="complemento">
                                            <span
                                                class="text-danger">{{ $errors->has('complemento') ? $errors->first('complemento') : '' }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">Bairro</label>
                                            <input type="text" id="input-postal-code"
                                                class="form-control form-control-alternative"
                                                placeholder="{{ $user[0]['bairro'] }}" name="bairro"
                                                value="{{ $user[0]['bairro'] }}">
                                            <span
                                                class="text-danger">{{ $errors->has('bairro') ? $errors->first('bairro') : '' }}</span>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-city">Cidade</label>
                                            <input type="text" id="input-city"
                                                class="form-control form-control-alternative"
                                                placeholder="{{ $user[0]['cidade'] }}" name="cidade"
                                                value="{{ $user[0]['cidade'] }}">
                                            <span
                                                class="text-danger">{{ $errors->has('cidade') ? $errors->first('cidade') : '' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">Estado</label>
                                            <input type="text" id="input-country"
                                                class="form-control form-control-alternative" placeholder="Brasil"
                                                value="{{ $user[0]['estado'] }}" name="estado">
                                            <span
                                                class="text-danger">{{ $errors->has('estado') ? $errors->first('estado') : '' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />

                            <button id="att" class="btn">Atualizar Dados</button>
                        </form>
                        <!-- Description -->
                        @if (session('msg'))
                            <hr>
                            <div class="alert alert-success text-center">
                                {{ session('msg') }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
