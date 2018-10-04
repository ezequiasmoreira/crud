<html>
    <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link  type="text/css" rel="stylesheet" href= {{url('css/estilo.css')}}>

    </head>
    <body>
        <!--cabeçalho-->
        <div class="">
            <div class="">

            </div>
        </div>
        <!--menu -->
        <div class="menu">
            <div class="nav-side-menu">
                <div class="brand"></div>
                <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
                <div class="menu-list">
                    <ul id="menu-content" class="menu-content collapse out">
                        <li>
                            <a href= {{ url('admin/'.session()->get('usuario_id').'/perfil' )}}>Administração</a>
                        </li>
                        <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                            <a href="#"></i>Cadastros <span class="arrow"></span></a>
                        </li>
                        <ul class="sub-menu collapse" id="products">
                            <li><a href= {{url('produto')}} >Produtos</a></li>
                            <li><a href= {{url('cliente')}}>Cliente</a></li>
                            <li><a href= {{url('movimentacao')}}>Movimentação</a></li>
                            <li><a href= {{url('empresa')}}>Empresa</a></li>
                            <li><a href= {{url('pais')}}>Pais</a></li>
                            <li><a href= {{url('estado')}}>Estado</a></li>
                            <li><a href= {{url('cidade')}}>Cidade</a></li>
                            <li><a href= {{url('endereco')}}>Endereço</a></li>
                        </ul>
                        <li data-toggle="collapse" data-target="#service" class="collapsed">
                            <a href="#">Relatórios <span class="arrow"></span></a>
                        </li>
                        <ul class="sub-menu collapse" id="service">
                            <li><a href= {{url('/relatorio/vendas')}}>Vendas</a></li>
                            <li>Identidade</li>
                            <li>Movimentação</li>
                        </ul>
                    </ul>
                </div>
            </div>
        </div>

       <div class="conteudo">
            @yield('content')
        </div>

    </body>
</html>
