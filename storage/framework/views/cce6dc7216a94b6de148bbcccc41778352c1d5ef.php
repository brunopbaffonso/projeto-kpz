<?php $__env->startSection('content'); ?>
<div id="page-wrapper" >
    <div class="header"> 
        <h1 class="page-header">Clientes</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/')); ?>">Inicio</a></li>
                <li class="active">Lista de Clientes</li>
                <li><a href="<?php echo e(url('clientes/create')); ?>">Adicionar Cliente</a></li>
            </ol>               
    </div>
    <?php echo Form::open(['url' => 'clientes', 'method' => 'get', 'class' => 'form-inline text-center']); ?>

     <div id="page-inner"> 
        <div class="form-group">
            <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
            <input type="text" class="form-control" name="nome" placeholder="Ex: Nome/CPF/CNPJ">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    <?php echo Form::close(); ?>   
        <div class="col-md-12">
            <!--   Basic Table  -->
                 <div class="panel panel-default">
                    <div class="panel-heading">
                          Lista de Clientes
                    </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>ID</td>
                                        <td class="hidden">Ativo</td>
                                        <td>Nome</td>
                                        <td>CPF</td>
                                        <td>CNPJ</td>
                                        <td>IE</td>
                                        <td>Endereço</td>
                                        <td>Bairro</td>
                                        <td>CEP</td>
                                        <td>Fone</td>
                                        <td>Celular</td>
                                        <td>E-mail</td>
                                        <td>Cidade</td>
                                    </tr>
                                    <?php $__currentLoopData = $cliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($cliente->idCliente); ?></td>
                                            <td class="hidden"><?php echo e($cliente->ativo); ?></td>
                                            <td><?php echo e($cliente->nome); ?></td>
                                            <td><?php echo e($cliente->cpf); ?></td>
                                            <td><?php echo e($cliente->cnpj); ?></td>
                                            <td><?php echo e($cliente->ie); ?></td>
                                            <td><?php echo e($cliente->endereco); ?></td>
                                            <td><?php echo e($cliente->bairro); ?></td>
                                            <td><?php echo e($cliente->cep); ?></td>
                                            <td><?php echo e($cliente->fone); ?></td>
                                            <td><?php echo e($cliente->celular); ?></td>
                                            <td><?php echo e($cliente->email); ?></td>
                                            <td><?php echo e($cliente->cidade_idCidade); ?></td>
                                            <td>
                                                <div role="group" class="btn-group">
                                                    <?php echo Form::open(['url' => 'clientes/'.$cliente->idCliente, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse Cliente?");']); ?>

                                                    <button  class="btn btn-warning btn-xs" href="clientes/<?php echo e($cliente->idCliente); ?>/edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                                    <?php echo Form::close(); ?>

                                                </div>
                                                <div role="group" class="btn-group">
                                                    <?php echo Form::open(['url' => 'clientes/'.$cliente->idCliente, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse Cliente?");']); ?>

                                                    <button class="btn btn-xs btn-danger type="submit" name=""><span class="glyphicon glyphicon-trash"></span></button>
                                                    <?php echo Form::close(); ?>

                                                </div>
                                            </td>
                                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>
            <div class="panel-body" align="left">
                <a href="clientes/create">
                    <button type="button" class="btn btn-primary">Cadastrar Cliente</button>
                 </a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.padrao', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>