<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>@yield('titulo')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    {{-- Meu CSS --}}

    <link href="{{ asset('css/estilo_login_usuario.css') }}" rel="stylesheet" />



    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.0.0/css/all.css">

    {{-- ICON --}}
    <link rel="icon" href="/img/logo_marca.png">
</head>

<body>
    <header>
        <!-- inicio Cabecalho -->
        <nav class="navbar navbar-expand-md navbar-light fixed-top navbar-transparente">
            <div class="container">

                <a href="{{ route('home') }}" class="navbar-brand">

                    <i class="fa-solid fill"> H o m e</i>
                </a>




            </div>
        </nav>
    </header>
    <!--/fim Cabecalho -->
    <div class="container">
        @yield('conteudo')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>

</html>
