<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="" name="description" />
    <meta content="Templateq" name="author" />
    <title>KAPAZI CAPACHOS PERSONALIZADOS</title>
    <!-- Tooltip -->
    <!--$(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })-->

    <!-- Bootstrap Styles-->
<?php echo Html::style('css/bootstrap.min.css'); ?>

<!-- FontAwesome Styles-->
<?php echo Html::style('css/font-awesome.css'); ?>

<!-- Custom Styles-->
<?php echo Html::style('css/custom-styles.css'); ?>


<?php echo Html::style('vendor/rafwell/simple-grid/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css'); ?>

<?php echo Html::style('vendor/rafwell/simple-grid/css/simplegrid.css'); ?>


<!-- Normalize-->
<!--<?php echo Html::style('css/normalize.css'); ?>-->
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <!-- Adicionando JQuery -->
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#endereco").val("...");
                        $("#bairro").val("...");
                        $("#cidade_idCidade").val("...");
                        $("#estado_idEstado").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#endereco").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade_idCidade").val(dados.localidade);
                                $("#estado_idEstado").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
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
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><strong> KAPAZI</strong></a>
            <div id="sideNav" href="">
                <i class="fa fa-bars icon"></i>
            </div>
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
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
    <nav class="navbar-default navbar-side">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">

                <li>
                    <a href="<?php echo e(url('/')); ?>""><i class="glyphicon glyphicon-chevron-right"></i> Inicio</a>
                </li>

                <li>
                    <a href="#"><i class="glyphicon glyphicon-chevron-right"></i> Ordem de Serviço<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo e(url('oss')); ?>">Listar Ordens de Serviço</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('oss/create')); ?>">Adicionar Ordem de Serviço</a>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-chevron-right"></i> Itens<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo e(url('items')); ?>">Listar Itens</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="glyphicon glyphicon-chevron-right"></i> Ordem de Compra<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo e(url('ocs')); ?>">Listar Ordens de Compra</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('ocs/create')); ?>">Adicionar Ordem de Compra</a>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-chevron-right"></i> Insumo<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo e(url('insumos')); ?>">Listar Insumos</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('insumos/create')); ?>">Adicionar Insumo</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="glyphicon glyphicon-chevron-right"></i> SubProduto<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo e(url('subprodutos')); ?>">Listar Subprodutos</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('subprodutos/create')); ?>">Adicionar Subproduto</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="glyphicon glyphicon-chevron-right"></i> Modelos<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo e(url('modelos')); ?>">Listar Modelos</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('modelos/create')); ?>">Adicionar Modelo</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="glyphicon glyphicon-chevron-right"></i> Fornecedores<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo e(url('fornecedores')); ?>">Listar Fornecedores</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('fornecedores/create')); ?>">Adicionar Fornecedor</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="glyphicon glyphicon-chevron-right"></i> Clientes<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo e(url('clientes')); ?>">Listar Clientes</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('clientes/create')); ?>">Adicionar Cliente</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="#"><i class="glyphicon glyphicon-chevron-right"></i> Usuarios<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo e(url('usuarios')); ?>">Listar Usuarios</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('usuarios/create')); ?>">Adicionar Usuario</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="glyphicon glyphicon-chevron-right"></i> Relatórios<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo e(url('relatorio/teste')); ?>">Relatórios</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
<?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->yieldPushContent('js'); ?>
<?php echo e(Html::script('js/jquery-1.10.2.js')); ?>

<!-- Bootstrap Js -->
<?php echo e(Html::script('js/bootstrap.min.js')); ?>

<!-- Metis Menu Js -->
<?php echo e(Html::script('js/jquery.metisMenu.js')); ?>

<!-- Custom Js -->
<?php echo e(Html::script('js/custom-scripts.js')); ?>

<!-- DEPENDÊNCIAS PARA RODAR LARAVEL-GRID - SÓ INCLUA SE AINDA NÃO ESTIVER USANDO-AS EM SEU PROJETO -->
<?php echo e(Html::script('vendor/rafwell/simple-grid/moment/moment.js')); ?>

<?php echo e(Html::script('vendor/rafwell/simple-grid/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>

<?php echo e(Html::script('vendor/rafwell/simple-grid/js/simplegrid.js')); ?>

<?php echo e(Html::script('//code.jquery.com/jquery-3.2.1.min.js')); ?>

<?php echo e(Html::script('text/javascript')); ?>




</body>

</html>