

@extends('privado.base')

@section('titulo', 'Carrinho de Compras')

@section('conteudo')

    <style>
        #att:hover {
            color: white;
            background: #4fd69c;
            width: 100% !important;
        }

        #clearCar:hover {
            color: white;
            background: rgb(221, 55, 55);
            width: 100% !important;
        }

        #cupom:hover {
            color: white;
            background: orangered;
            height: 100%;
        }

        input:hover {
            border: solid 2px !important;
            border-color: rgb(204, 169, 118) !important;

        }
    </style>

    <?php
    use App\Models\Carrinho;
    $qtd = Carrinho::where('user_email', $_SESSION['email'])->count();

    $nome_da_padaria = 'Bakery';
    ?>

    <br><br><br> <br><br><br>

    <div class="text-center">
        <h1> Carrinho de Compras</h1>
    </div>
    <hr>
    <div class="container">
        @if (!count($carrinho) > 0)
            <div class="text-center">
                <img src="img/carrrinho_vazio.png" style="max-width: 100%">

            </div>
        @else
            <table class="table table-striped" width="50%">
                <thead>
                    <tr>
                        <th scope="col">Imagem</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Detalhe</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Remover</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $produtos_no_carrinho = '';
                    $total = 0;
                    $cupom = 0;
                    $frete = 0;
                    $ultimoID = 0;
                    ?>
                    @foreach ($carrinho_de_compra as $produto)
                        @foreach ($carrinho as $car)
                            @if ($car->id_produto == $produto->id)
                                <?php $total += $produto->valor; ?>
                                <tr>

                                    <th scope="row"><img src="{{ $produto->imagem }}"
                                            class="card-img-center rounded-circle img-fluid" width="50px"></th>
                                    <td>{{ $produto->produto }}</td>
                                    <td>{{ $produto->peso }} {{ $produto->tipo_peso }}</td>
                                    <td><b class="text-success">{{ $produto->valor }},00</b></td>
                                    <td>
                                        <form id="form_{{ $car->id }}" action="/removeToCart/{{ $car->id }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                    </td>

                                </tr>
                                <?php $produtos_no_carrinho .= $car->id_produto . '-';
                                $cupom = $car->cupom;
                                $ultimoID = $car->id;
                                ?>
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
    </div>





    <div class="container">

        <hr>

        <div id="cardin" class="row">



            <div class="col-sm-8">
                <div class="box-cart-totais">
                    <table class="table">
                        <tr>
                            <td>Endereço para Entrega:</td>
                            <td class="text-right">{{ $user[0]['endereco'] }}
                            </td>
                        </tr>

                        <tr>
                            <td>Subtotal ( item ):</td>
                            <td class="text-right text-success">R$ {{ $total }},00</td>
                        </tr>
                        <tr>
                            <td>Frete:</td>
                            <td class="text-right text-success">Frete Grátis </td>
                        </tr>




                        <tr style="border-top:#999 1px solid;">
                            <td class="text-roxo text-bold">Cupom:</td>
                            <td id="idSuaDiv" class="text-orange text-bold text-right">R$ -{{ $cupom }},00</td>

                        </tr>
                        <?php $total_final = $total + $frete - $cupom; ?>
                        <tr style="border-top:#999 1px solid;">
                            <td class="text-roxo text-bold">Total:</td>
                            <td class="text-roxo text-bold text-right text-success"><b>R$ {{ $total_final }},00</b>
                            </td>

                        </tr>
                    </table>
                </div>
            </div>


            <div class="col-sm-4">
                <div class="box-outline-grey">
                    Informe aqui seu Cupom de Desconto
                    <form action="{{ route('cupom', $ultimoID) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="input-group col-xs-4" style="">
                            <input name="cupom" class="form-control">

                            <span class="input-group-btn">
                                <button id="cupom" class="btn btn-default">Inserir</button>
                            </span>

                        </div>
                        <span class="text-danger">{{ $errors->has('cupom') ? $errors->first('cupom') : '' }}</span>
                    </form>
                    <br>

                    <form action="{{ route('fazerPedido') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label class="form-label">Observações:</label>
                            <input name="obs" class="form-control nv-area" rows="3" value="{{ old('obs') }}" placeholder="Observações aqui">
                        </div>

                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text bg-gradient-info text-white " for="inputGroupSelect01">Forma de
                        Pagamento</label>
                    <select name="pagamento" class="form-control text-center" id="inputGroupSelect01">
                        <option value="" selected>Selecione...</option>
                        <option value="Cartão">Cartão</option>
                        <option value="Dinheiro">Dinheiro</option>
                        <option value="Pix">Pix</option>
                    </select>
                    {{-- <span class="text-danger">{{ $errors->has('pagamento') ? $errors->first('pagamento') : '' }}</span> --}}
                </div>
            </div>
        </div>
        <div style="display: none !important">
            <input name="user_email" value="{{ $user[0]['email'] }}">

            <input name="produtos" value="{{ $produtos_no_carrinho }}">

            <input name="status" value="1">

            <input name="subtotal" value="{{ $total }}">

            <input name="total" value="{{ $total_final }}">

            <input name="frete" value="Frete Grátis">

            <input name="apelido" value="{{ $user[0]['apelido'] }}">

            <input name="cep" value="{{ $user[0]['cep'] }}">

            <input name="endereco" value="{{ $user[0]['endereco'] }}">

            <input name="complemento" value="{{ $user[0]['complemento'] }}">

            <input name="bairro" value="{{ $user[0]['bairro'] }}">

            <input name="cidade" value="{{ $user[0]['cidade'] }}">

            <input name="estado" value="{{ $user[0]['estado'] }}">

            <input name="cupom" value="{{ $cupom }}">
        </div>
        <div class="row">
            <div class="col-sm-8">
                <button id="att" class="btn">Finalizar Pedido</button>
                </form>
            </div>
            <div class="col-sm-4">
                <form action="/limparCarrinho/{{ $user[0]['email'] }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button id="clearCar" class="btn">Limpar Carrinho</button>
                </form>
            </div>
        </div>

        {{-- Mostrar todos os erros --}}
        @if ($errors->any())
        <hr>
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @endif
    </div>



@endsection
