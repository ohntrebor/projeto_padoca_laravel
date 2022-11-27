
    @extends('privado.base')

    @section('titulo', 'Adm')

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
            <h1> Área ADM</h1>
        </div>
        <hr>
        <div class="container">

            <table class="table table-striped" width="50%">
                <thead>
                    <tr class="row">
                        <th class="col">Nº Pedido</th>
                        <th class="col">Cliente</th>
                        <th class="col">Status</th>
                        <th class="col">Data</th>
                        <th class="col"><i class="fa-solid fa-gear"></i></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($pedidos as $pedido)
                        <tr class="row">

                            <td class="col">#000{{ $pedido->id }}</td>


                            <td class="col">{{ $pedido->user_email }}</td>
                            <td class="col">
                                @switch($pedido->status)
                                    @case(1)
                                        Pedido Pendente
                                    @break

                                    @case(2)
                                        Pedido em Produção
                                    @break

                                    @case(3)
                                        Saiu para entrega
                                    @break

                                    @case(4)
                                        Pedido Entregue
                                    @break
                                @endswitch
                            </td>
                            <td class="col">{{ $pedido->created_at->format('d/m/Y') }} ás
                                {{ explode(' ', $pedido->created_at)[1] }}</td>


                            <td class="col">
                                @switch($pedido->status)
                                    @case(1)
                                        <form action="{{ route('attStatusPedidos', $pedido->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input name="status" value="2" style="display: none">
                                            <button class="btn btn-dribbble"><i class="fa-light fa-hand-holding-box"></i></button>
                                        </form>
                                    @break

                                    @case(2)
                                        <form action="{{ route('attStatusPedidos', $pedido->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input name="status" value="3" style="display: none">
                                            <button class="btn btn-facebook"><i class="fa-solid fa-motorcycle"></i></button>
                                        </form>
                                    @break

                                    @case(3)
                                        <i class="fa-solid fa-bell-exclamation text-yellow"></i> <b>Aguardando confirmação da
                                            Entrega</b>
                                    @break

                                    @case(4)
                                        <i class="fa-regular fa-thumbs-up text-success"></i> Entregue
                                    @break
                                @endswitch
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if (session('msg'))
            <hr>
            <div class="alert alert-success text-center">
                {{ session('msg') }}
            </div>
        @endif
        <hr>


    @endsection
