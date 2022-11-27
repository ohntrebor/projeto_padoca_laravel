<!DOCTYPE html>
<html lang="pt-br">
<?php
use App\Models\Carrinho;
use App\Models\Pedido;
use App\Models\Produto;

$qtd = Carrinho::where('user_email', $_SESSION['email'])->count();
$pedidos = Pedido::where('user_email', $_SESSION['email'])->paginate(1);
$produtos = Produto::all();

// $produtos_pedido = explode("-",$pedidos->id[1]);
$produtos_no_carrinho = [];
foreach ($pedidos as $key => $produtos_pedido) {
            $produtos_no_carrinho[$key] = explode("-",$produtos_pedido->produtos);
        }



$quantidade_produto = 0;

$nome_da_padaria = 'Bakery';
?>

<head>


    <title>@yield('titulo')</title>
    <script>


    </script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- ICON --}}
    <link rel="icon" href="/img/logo_marca.png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.0.0/css/all.css">



    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>

    <!-- CSS Files -->
    <link href="{{ asset('css/cafeteria-dashboard.css?v=1.1.0') }}" rel="stylesheet" />

    <!--   Meu CSS-->
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">

    <style>
        a.text-primary:hover,
        a.text-primary:focus {
            color: #ffd600 !important;
            font-size: 130% !important;
        }
    </style>

    <script>

        var url_ = document.URL;

    </script>
</head>

<body class="">
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light navbar-transparente" id="sidenav-main">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="nav align-items-center d-md-none">
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-bell-55" style="color: white"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right"
                        aria-labelledby="navbar-default_dropdown_1">
                        <a class="dropdown-item" href="#"><i class="fa-light fa-person-carry-box"></i>Delivery</a>
                    </div>
                </li> --}}
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="/img/user.png">
                            </span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Menu</h6>
                        </div>
                        <a href="{{ route('user') }}" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>Meus dados</span>
                        </a>

                        <a href="{{Request::url()}}?page=1" onClick="modalDisparo()" class="dropdown-item">
                            <i class="fa-light fa-clipboard-list"></i>
                            <span>Meus Pedidos</span>
                        </a>

                        @if ($_SESSION['email'] == 'adm@boss.com')


                        <a href="" class="dropdown-item">
                            <i class="fa-solid fa-pie"></i>
                            <span class="fill">Boss</span>
                        </a>
                        @endif


                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logoff') }}" class="dropdown-item logoff">

                            <i class="fa-regular fa-power-off "></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Collapse header -->
                <div class="navbar-collapse-header d-md-none">
                    <div class="row">

                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                                aria-label="Toggle sidenav">x
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Form -->
                <form class="mt-4 mb-3 d-md-none">
                    <div class="input-group input-group-rounded input-group-merge">
                        <input type="search" class="form-control form-control-rounded form-control-prepended"
                            placeholder="Search" aria-label="Search">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-search"></span>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li id="" class="nav-item" style="text-align: center !important">

                        <img src="/img/bakery.png" class="" width="50%">


                    </li>

                    <li id="home" class="nav-item active">

                        <a href="{{ route('home') }}" class="nav-link text-primary"> <i class="ni ni-tv-2"></i>
                            Home
                        </a>
                    </li>



                    <li id="produtos" class="nav-item">

                        <a class="nav-link text-primary" href="{{ route('produtos.index') }}">
                            <i class="fa-solid fa-fork-knife"></i>
                            Lista de Produtos
                        </a>

                    </li>


                    <li id="carrinho" class="nav-item">

                        <a id="" class="nav-link text-primary" href="{{ route('carrinho.index') }}">
                            <i class="fa-solid fa-cart-shopping-fast"></i>
                            Carrinho <i class="fal-comment"></i>
                            <span style="border-radius: 50%"
                                class="bg-white rounded-pill text-warning py-0 px-2">{{ $qtd }}</span>
                        </a>

                    </li>

                </ul>


                <hr class="my-3">


            </div>
        </div>
    </nav>
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">

                <!-- Form -->
                <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input class="form-control" placeholder="Search" type="text">
                        </div>
                    </div>
                </form>
                <!-- User -->
                <ul class="navbar-nav align-items-center d-none d-md-flex modal-sombra">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href=" " role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="/img/user.png">
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold"></span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Menu</h6>
                            </div>
                            <a href="{{ route('user') }}" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>Meus dados</span>
                            </a>

                            <a href="{{Request::url()}}?page=1" onClick="modalDisparo()" class="dropdown-item">
                                <i class="fa-light fa-clipboard-list"></i>
                                <span>Meus Pedidos</span>
                            </a>
                            @if ($_SESSION['email'] == 'adm@boss.com')


                            <a href="{{ route('listarPedido')}}" class="dropdown-item">
                                <i class="fa-solid fa-pie"></i>
                                <span class="fill">Boss</span>
                            </a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logoff') }}" class="dropdown-item logoff">

                                <i class="fa-regular fa-power-off "></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->



        <!-- Header -->
        <div id="header"
            class="header bg-gradient-primary pb-5 pt-5 pt-md-8"style="border-radius: 0px 0px 30px 30px !important">
            <div class="container-fluid">
                <div class="header-body">
                    <!-- Card stats -->

                </div>
            </div>
        </div>








        <div id="conteudo" class="container-fluid mt--7">

            <!--	CONTEUDO AQUI-->


            @yield('conteudo')


            <!--		  ANIMATIONS-->

            <hr>
            <!-- Footer -->
            <footer class="footer row">
                <div class="col-sm-2">
                    <div class="copyright text-center text-xl-center text-muted">
                        &copy; <a href="{{ route('home') }}" class="font-weight-bold ml-1">{{ $nome_da_padaria }}</a>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="copyright text-center text-xl-center text-muted">
                        <img src="/img/insta.png" class="card-img-center rounded-circle img-fluid" width="40px">
                    </div>
                </div>

                <div class="col-sm-1">
                    <div class="copyright text-center text-xl-center text-muted">
                        <img src="/img/facebook.png" class="card-img-center rounded-circle img-fluid" width="25px"
                            height="25px">
                    </div>
                </div>

                <div class="col-sm-1">
                    <div class="copyright text-center text-xl-center text-muted">
                        <img src="/img/wpp.png" class="card-img-center rounded-circle img-fluid" width="25px"
                            height="25px">
                    </div>
                </div>

        </div>
        </footer>

    </div>


    </div>


    <!-- Modal -->
    <div class="modal fade" id="modal-Information" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div id="modal_titulo_div" style="margin-left:30% !important">
                    <h5 class="modal-title" id="modal_titulo"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal_conteudo"></div>
                <div id="modal-footer" class="modal-footer">
                    <button type="button" data-dismiss="modal" id="modal_btn">Voltar</button>
                </div>
            </div>
        </div>
    </div>


    <!--   Core   -->
    <script src="/js/plugins/jquery/dist/jquery.min.js"></script>
    <script src="/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--   Optional JS   -->

    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>


    <script>
        var posicao = $.ajaxSettings.url.split("/").length - 1;
        var path = $.ajaxSettings.url.split("/")[posicao];

        $(".sidebar ul li.active").removeClass('active');
        $(`#${path}`).addClass('active bg-padoca text-white').children().addClass('text-white');
    </script>


<script>
    var n_pedido = document.URL.substr(length-1);
    if(n_pedido == "#"){
        n_pedido = 1;
    }

    function modalDisparo() {

        document.getElementById('modal_titulo').innerHTML = `<div class="container text-center"><nav aria-label="Page navigation example">
<ul class="pagination">
    <li class="page-item">
        <a class="page-link" href="?page=${n_pedido-1}" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
    </li>



    <li class="page-item"><a class="page-link" href="?page=${n_pedido}">${n_pedido}</a></li>

    <li id="next" class="page-item">
        <a class="page-link" href="?page=${n_pedido-1+2}" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
    </li>
</ul>
</nav></div>`
        document.getElementById('modal_titulo_div').className = 'modal-header text-danger'
        document.getElementById('modal_conteudo').innerHTML =
            `
            @foreach ($pedidos as $key => $pedido)


<table class="table" width="50%">
<thead>

    <tr>
        <th scope="col"><i class="fa-solid fa-thumbtack"></i> Pedido #000{{$pedido->id}}</th>
        <th scope="col">{{ $pedido->created_at->format('d/m/Y') }} ás {{ explode(" ",$pedido->created_at)[1]}}</th>

    </tr>

    <tr>
        <th scope="col">Status</th>
        <th scope="col">

            @switch($pedido->status)
                            @case(1)
                            Pedido Pendente
                            @break

                            @case(2)
                            Pedido em Produção
                            @break

                            @case(3)
                            Saiu para Entrega<br>
                            <form action="{{ route('attStatusPedidos', $pedido->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input name="status" value="4" style="display: none">
                                <button class="btn btn-success">Confirmar Entrega</button>
                            </form>
                            @break

                            @case(4)
                            Entregue <i class="fa-sharp fa-solid fa-thumbs-up text-success"></i>
                            @break
                        @endswitch



        </th>


    </tr>

</thead>
</table>
<br>
<table class="table table-striped" width="50%">
<thead>
    <tr>
        <th scope="col">Produto</th>
        <th scope="col">Und</th>
        <th scope="col">Valor</th>

    </tr>
</thead>
<tbody>

    @foreach ($produtos_no_carrinho[$key] as $produto_no_carrinho)
    @foreach ($produtos as $contador => $produto)
    @if($produto_no_carrinho == $produto->id)
    <tr>

        <td>{{ $produto->produto }}</td>
        <td>1x</td>
        <td>R$ {{ $produto->valor }},00</td>
        <?php $quantidade_produto++;  ?>
    </tr>
    @endif
    @endforeach
    @endforeach

    <tr>

        <td>Quantidade Total:</td>
        <td>{{ $quantidade_produto }}x</td>
        <td></td>
    </tr>

</tbody>
</table>

<br>
<table class="table text-center" width="50%">
<thead>

    <tr>
        <th scope="col">Resumo de Pagamento</th>

    </tr>

</thead>
</table>


<table class="table" width="50%">
<thead>

    <tr>
        <th scope="col"><i class="fa-regular fa-bags-shopping"></i> Subtotal:</th>
        <th scope="col">R$ {{ $pedido->subtotal }},00</th>

    </tr>

    <tr>
        <th scope="col"><i class="fa-solid fa-moped"></i> Taxa de Entrega</th>
        <th scope="col"> Grátis</th>

    </tr>

    <tr>
        <th scope="col"><i class="fa-solid fa-ticket"></i> Cupom</th>
        <th scope="col">R$ -{{$pedido->cupom}},00</th>

    </tr>

    <tr>
        <th scope="col"><i class="fa-solid fa-cash-register"></i> Total</th>
        <th scope="col">R$ {{$pedido->total}},00</th>

    </tr>

    <tr>
        <th scope="col"><i class="fa-duotone fa-money-bill"></i> Forma de Pagamento</th>
        <th scope="col">{{$pedido->pagamento}}</th>

    </tr>
</thead>
</table>
<br>


<table class="table" width="50%">
<thead>

    <tr>
        <th scope="col"><i class="fa-solid fa-map-location-dot"></i> Endereço de Entrega:</th>
        <th scope="col">{{ $pedido->endereco }}</th>

    </tr>

    <tr>
        <th scope="col"><i class="fa-solid fa-message-lines"></i> Observações</th>
        <th scope="col"> {{ $pedido->obs }}</th>

    </tr>
</thead>
</table>



<?php $quantidade_produto = 0 ?>
@endforeach


            `
        document.getElementById('modal_btn').innerHTML = 'Fechar'
        document.getElementById('modal_btn').className = 'btn btn-lg btn-custom btn-danger'
        // document.getElementById('modal-footer').innerHTML =


        $('#modal-Information').modal('show')


    }


    if(document.URL.indexOf("page") != -1){

        modalDisparo();

    }

    if(document.querySelector("#modal_conteudo").innerText.length < 30){

        document.querySelector("#next").style.display = "none";
        document.querySelector("#modal_conteudo").innerHTML = `<div class="text-center"><i class="fa-regular fa-cart-circle-xmark"></i></div>`
    }


</script>

</body>

</html>
