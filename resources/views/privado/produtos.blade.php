@extends('privado.base')

@section('titulo', 'Lista de Produtos')

@section('conteudo')

    <style>

/* robert */
@media (min-width: 575.98px) {
    .card:hover,
    .card:focus {
        width: 200px !important;
        font-size: 130% !important;
        position: absolute !important;
        z-index: 1;
    }
}
    </style>
    {{-- {{$_SESSION['email']}} --}}
    <br><br><br> <br><br><br>
    <div class="text-center">
        <h1> Lista de Produtos</h1>
<!-- Description -->
@if (session('msg'))
<hr>
<div class="alert alert-success text-center">
    {{ session('msg') }}
</div>
@endif
    </div>
    <hr>
    <div id="bebidas" class="row">

        @foreach ($produtos as $produto)
            @if ($produto->tipo_peso == 'ml')


                <div id="#{{ $produto->id }}" class="col-sm-2 py-1">

                    <div class="card bg-gradient-primary">
                        <div class="card-body">
                            <img src="{{ $produto->imagem }}" class="card-img-center rounded-circle" style="width: 100%">

                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="fa-duotone fa-mug-hot"></i> {{ $produto->produto }}</li>
                            <li class="list-group-item"><i class="fa-duotone fa-circle-info"></i> {{ $produto->peso }}
                                {{ $produto->tipo_peso }}</li>
                            <li class="list-group-item">
                                <i class="fa-duotone fa-circle-dollar text-success"></i> <b
                                    class="text-success">{{ $produto->valor }},00</b>
                                &nbsp;&nbsp;
                                <div style="display: none">
                                    <form id="form_{{ $produto->id }}" method="post" action="{{ route('addToCart') }}">
                                        @csrf
                                        <input name="id_produto" value="{{ $produto->id }}" type="text"
                                            placeholder="{{ $produto->id }}">
                                        <input name="user_email" value="{{ $_SESSION['email'] }}" type="text"
                                            placeholder="{{ $_SESSION['email'] }}">
                                        <input name="quantidade" value=1 placeholder="quantidade">

                                        <input name="cupom" value=0 placeholder="" style="display: none">
                                </div>
                                <a href="#" onclick="document.getElementById('form_{{ $produto->id }}').submit()"><i
                                        class="fa-regular fa-cart-plus"></i></a>
                                {{-- <button><i class="fa-regular fa-cart-plus"></i></button> --}}
                                </form>

                            </li>


                        </ul>

                    </div>
                </div>
            @endif
        @endforeach

    </div>



    <div id="salgados" class="row">
        @foreach ($produtos as $produto)
            @if ($produto->tipo_peso == 'g')
                <div class="col-sm-2 py-1">

                    <div class="card bg-gradient-primary">
                        <div class="card-body">
                            <img src="{{ $produto->imagem }}" class="card-img-center rounded-circle" style="width: 100%">

                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="fa-solid fa-baguette"></i> {{ $produto->produto }}
                            </li>
                            <li class="list-group-item"><i class="fa-duotone fa-circle-info"></i> {{ $produto->peso }}
                                {{ $produto->tipo_peso }}</li>
                            <li class="list-group-item text-success">
                                <i class="fa-duotone fa-circle-dollar text-success"></i><b> {{ $produto->valor }},00</b>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <div style="display: none">
                                    <form id="form_{{ $produto->id }}" method="post" action="{{ route('addToCart') }}">
                                        @csrf
                                        <input name="id_produto" value="{{ $produto->id }}" type="text"
                                            placeholder="{{ $produto->id }}">
                                        <input name="user_email" value="{{ $_SESSION['email'] }}" type="text"
                                            placeholder="{{ $_SESSION['email'] }}">
                                        <input name="quantidade" value=1 placeholder="quantidade">

                                        <input name="cupom" value=0 placeholder="" style="display: none">
                                </div>
                                <a href="#" onclick="document.getElementById('form_{{ $produto->id }}').submit()"><i
                                        class="fa-regular fa-cart-plus"></i></a>
                                {{-- <button><i class="fa-regular fa-cart-plus"></i></button> --}}
                                </form>
                            </li>


                        </ul>

                    </div>
                </div>
            @endif
        @endforeach


    </div>
    {{-- Rever depois a questão da paginação --}}
    {{-- {{ $produtos->appends($request)->links() }} --}}
@endsection
