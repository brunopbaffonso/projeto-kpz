<?php $__env->startSection('content'); ?>
<div id="page-wrapper" >
    <div class="header"> 
        <h1 class="page-header">Ordem de Serviço</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/')); ?>">Inicio</a></li>
                <li class="active">Lista de Serviços</li>
                <li><a href="<?php echo e(url('oss/create')); ?>">Adicionar Serviço</a></li>
            </ol>               
    </div>
    <?php echo Form::open(['url' => 'oss', 'method' => 'get', 'class' => 'form-inline text-center']); ?>

    <div id="page-inner">  
    <div class="form-group">
        <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
        <input type="text" class="form-control" name="nome" placeholder="Ex: Preço Total/Forma Pgto/Observações">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
    <?php echo Form::close(); ?>

     <div class="col-md-12">
            <!--   Basic Table  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                          Lista de Ordem Serviços
                    </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>ID</td>
                                        <td>Preço Total</td>
                                        <td>Desconto</td>
                                        <td>Forma Pgto</td>
                                        <td>Observações</td>
                                        <td>Data de Criação</td>
                                        <td class="col-md-2 "></td>
                                    </tr>
                                    <?php $__currentLoopData = $os; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $os): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($os->idOS); ?></td>
                                            <td><?php echo e($os->precoTotal); ?></td>
                                            <td><?php echo e($os->desconto); ?></td>
                                            <td><?php echo e($os->formaPgto); ?></td>
                                            <td><?php echo e($os->observacoes); ?></td>
                                            <td><?php echo e($os->created_at); ?></td>
                                            <td>
                                                <div role="group" class="btn-group">
                                                    <button class="btn btn-sucess btn-xs" href="oss/<?php echo e($os->idOS); ?>/create"><span class="glyphicon glyphicon-plus"></span></button>
                                                </div>
                                                <div role="group" class="btn-group">
                                                    <?php echo Form::open(['url' => 'oss/'.$os->idOS, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse OS?");']); ?>

                                                    <button class="btn btn-warning btn-xs" href="oss/<?php echo e($os->idOS); ?>/edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                                    <?php echo Form::close(); ?>

                                                </div>
                                                <div role="group" class="btn-group">
                                                    <?php echo Form::open(['url' => 'oss/'.$os->idOS, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse OS?");']); ?>

                                                    <button type="submit" name="nada" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                                                    <?php echo Form::close(); ?>

                                                </div>  
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>
                    <div class="panel-body" align="left">
                        <a href="oss/create">
                            <button type="button" class="btn btn-primary">Cadastrar OS</button>
                        </a>
                    </div>
                </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.padrao', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>