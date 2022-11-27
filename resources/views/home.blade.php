<!DOCTYPE html>
<html lang="pt-br">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="YwkKdQtlXlclWGkvWEVpBjQsOnsNZwB6-px8dPhgI23_j0ZJpiH-X32-">
    <!--		JQuery-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- KATEX -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.10.1/dist/katex.min.css"
        integrity="sha384-dbVIfZGuN1Yq7/1Ocstc1lUEm+AT+/rCkibIcC/OmWo5f0EA48Vf8CytHzGrSwbQ" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.0.0/css/all.css">

    <link rel="stylesheet" type="text/css" href="css/home.css">

    <title>Home Bakery</title>


    <link rel="icon"
        href="https://amopaocaseiro.com.br/wp-content/uploads/2020/01/pao-caseiro-para-iniciantes_02.jpg"
        class="rounded-circle">

</head>


<body>
    <header>
        <!-- inicio Cabecalho -->
        <nav class="navbar navbar-expand-md navbar-light fixed-top navbar-transparente">
            <div class="container">
                <a href="index.html" class="navbar-brand">
                    <!--			  Pesquisar melhor depois para incluir um doc de extensão svg-->
                    <b href="" class="nav-link my-Name" style="text-decoration: none;font-family"></b>
                </a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
                    <i class="fas fa-bars text-white"></i>
                </button>
                <div class="collapse navbar-collapse" id="nav-principal">


                    <ul class="navbar-nav ml-auto m--3">

                        <li class="nav-item">
                            <a href="#bakery" class="nav-link"><i class="fa-solid fill"> Ínicio</i></a>
                        </li>
                        <li class="nav-item divisor"></li>

                        <li class="nav-item">
                            <a href="#especialidades" class="nav-link"><i class="fa-solid fill"> Especialidades</i></a>
                        </li>
                        <li class="nav-item divisor"></li>
                        <li class="nav-item">
                            <a href="#sobrenos" class="nav-link"><i class="fa-solid fill"> Team</i></a>
                        </li>

                        <li class="nav-item divisor"></li>
                        <a href="{{ route('carrinho.index') }}" class="nav-link text-white">
                            <i class="fa-solid fa-cart-shopping-fast fill"></i>
                        </a>
                        <li class="nav-item divisor"></li>

                        <li>
                            <a href="{{ route('login') }}" class="nav-link text-white">

                                <i class="fa-solid fa-user-chef fill"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!--/fim Cabecalho -->


    <div class="container-scroll">


        <scroll id="bakery">

            <div class="container text-center navbar-transparente">
                <div class="row align-items-center ">
                    <div id="" class="col ">
                        <h2 class="text-center text-white">Existimos para fazer o seu Sonho</h2>
                    </div>
                </div>
            </div>

        </scroll>

        <scroll id="especialidades">

            <div class="container text-center">

                <div class="row align-items-center">

                    <div id="" class="col rounded-circle imagem-redonda-1">
                        <h3 class="text-center">Sonhos</h3>
                    </div>

                    <div id="" class="col rounded-circle imagem-redonda-2">
                        <h3 class="text-center">Chá</h3>
                    </div>
                    <div id="" class="col rounded-circle imagem-redonda-3">
                        <h3 class="text-center">Pão</h3>
                    </div>
                    <div id="" class="col rounded-circle imagem-redonda-4">
                        <h3 class="text-center">Café</h3>
                    </div>
                </div>

            </div>
        </scroll>



        <scroll id="sobrenos">

            <div class="container text-center">
                <div class="row align-items-center">
                    <div class="col sobrenos">
                        <img alt="Image placeholder" src="/img/guilherme.png" width="40%"
                            class="avatar avatar-sm rounded-circle">
                        <br>
                        <span class="nomes">
                        Guilherme Belmonte
                    </span>
                        <p>Profissional responsável pelos testes do sistema e cultivo interno de plantas para o nosso
                            famoso chá.
                        </p>
                    </div>

                    <div class="col sobrenos">
                        <img alt="Image placeholder" src="/img/gustavo.png" width="40%"
                            class="avatar avatar-sm rounded-circle">
                        <br>
                        <span class="nomes">
                        Gustavo Henrique Lima
                    </span>
                        <p>Profissional responsável pela Arquitetura e desenho do layout da página e
                            entregador preferido de nossa clientela
                        </p>
                    </div>

                    <div class="col sobrenos">
                        <img alt="Image placeholder" src="/img/higor.jpeg" width="40%"
                            class="avatar avatar-sm rounded-circle">
                        <br>
                        <span class="nomes">
                        Higor Souza de Almeida
                    </span>
                        <p>Profissional responsável pela modelagem de dados e da receita secreta das massas supremas de
                            nossos salgados.
                        </p>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col sobrenos">
                        <img alt="Image placeholder" src="/img/leonardo.png" width="40%"
                            class="avatar avatar-sm rounded-circle">
                        <br>
                        <span class="nomes">
                        Leonardo de Almeida Ferreira
                    </span>
                        <p>Profissional responsável pelo front da aplicação, como também
                            pelo excelente atendimento de nossa Padoca.
                        </p>
                    </div>

                    <div class="col sobrenos">
                        <img alt="Image placeholder" src="/img/reverton.jpeg" width="40%"
                            class="avatar avatar-sm rounded-circle">
                        <br>
                        <span class="nomes">
                        Reverton Ailton da Conceição
                    </span>
                        <p>Profissional responsável pelo back da aplicação e
                            o padeiro chefe por trás do pão mais famoso da região.
                        </p>
                    </div>

                    <div class="col sobrenos">
                        <img alt="Image placeholder" src="/img/robert.jpeg" width="40%"
                            class="avatar avatar-sm rounded-circle">
                        <br>
                        <span class="nomes">
                        Robert Alves dos Anjos
                        </span>
                        <p>Profissional full stack do projeto, responsável pela administração e financeiro da padoca, super equipe de 6.

                        </p>
                    </div>

                </div>
            </div>

        </scroll>



    </div>







    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>



</body>

</html>
