<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="" name="description" />
    <meta content="Templateq" name="author" />
    <title>KAPAZI CAPACHOS PERSONALIZADOS</title>
    <!-- Bootstrap Styles-->
    <link href="{{URL::asset(css/bootstrap.css)}}" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{{URL::asset(css/font-awesome.css)}}" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="{{URL::asset(css/custom-style.css)}}" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><strong> KAPAZI</strong></a>
                <div id="sideNav" href="">
        <i class="fa fa-bars icon"></i> 
        </div>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Doe</strong>
                                    <span class="pull-right text-muted">
                                        <em>Today</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since an kwilnw...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href=""><i class="glyphicon glyphicon-chevron-right"></i> Inicio</a>
                    </li>

                    <li>
                        <a href="#"><i class="glyphicon glyphicon-chevron-right"></i> Insumo<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="chart.html">Adicionar Insumo</a>
                            </li>
                            <li>
                                <a href="morris-chart.html">Lista Insumo</a>
                            </li>
                        </ul>
                    </li> 

                    <li>
                        <a href="#"><i class="glyphicon glyphicon-chevron-right"></i> Ordem de Serviço<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="chart.html">Adicionar Ordem de Serviço</a>
                            </li>
                            <li>
                                <a href="morris-chart.html">Lista Ordem de Serviço</a>
                            </li>
                        </ul>
                    </li>   
                     
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-chevron-right"></i> Ordem de Compra<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="chart.html">Adicionar Ordem de Compra</a>
                            </li>
                            <li>
                                <a href="morris-chart.html">Lista Ordem de Compra</a>
                            </li>
                        </ul>
                    </li> 

                    <li>
                        <a href="#"><i class="glyphicon glyphicon-chevron-right"></i> Fornecedores<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="chart.html">Entrar em Contato</a>
                            </li>
                            <li>
                                <a href="morris-chart.html">Adicionar Fornecedor</a>
                            </li>
                        </ul>
                    </li> 

                    <li>
                        <a href="#"><i class="glyphicon glyphicon-chevron-right"></i> Clientes<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="chart.html">Entrar em Contato</a>
                            </li>
                            <li>
                                <a href="morris-chart.html">Adicionar Cliente</a>
                            </li>
                        </ul>
                    </li> 

                    <li>
                        <a href="#"><i class="glyphicon glyphicon-chevron-right"></i> Gerar Relátorios<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="chart.html">Compra</a>
                            </li>
                            <li>
                                <a href="morris-chart.html">Venda</a>
                            </li>
                            <li>
                                <a href="morris-chart.html">Entregas</a>
                            </li>
                            <li>
                                <a href="morris-chart.html">Pagamento Vendedores</a>
                            </li>
                        </ul>
                    </li> 
            </div>
        </nav>
        @yield('conteudo')
        {{ URL::script('js/jquery-1.10.2.js') }}
        {{ URL::script('js/bootstrap.min.js') }}
        {{ URL::script('js/dataTables/jquery.dataTables.js') }}
        {{ URL::script('js/jquery.metisMenu.js') }}
        {{ URL::script('js/dataTables/dataTables.bootstrap.js') }}
        {{ URL::script('js/custom-scripts.js') }}
</body>
</html>