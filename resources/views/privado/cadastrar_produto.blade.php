@extends('privado.base')

@section('titulo', $titulo)

@section('conteudo')
    <div class="container text-center">
        <div class="">
            <h1>{{ $titulo}}</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <form  method="post" action={{ route('produtos.store') }}>
                    @csrf
                    <input name="produto" value="{{ old('produto') }}" type="text" placeholder="Nome do Produto" class="">

                    <input name="peso" value="{{ old('peso') }}" type="text" placeholder="peso" class="">

                    <input name="tipo_peso" value="{{ old('tipo_peso') }}" type="text" placeholder="Tipo do peso (ml ou gm)" class="">

                    <input name="valor" value="{{ old('valor') }}" type="" placeholder="Valor $" class="">

                    <input name="imagem" value="{{ old('imagem') }}" type="text" placeholder="Link imagem" class="">
                    <br>
                    <button type="submit" class="btn">Cadastrar</button>

                </form>
            </div>
        </div>
    </div>


@endsection
