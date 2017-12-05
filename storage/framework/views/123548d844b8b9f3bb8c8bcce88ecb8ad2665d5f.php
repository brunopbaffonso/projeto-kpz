<?php $__env->startSection('content'); ?>
<div id="page-wrapper" >
    <div class="header"> 
        <h1 class="page-header">Modelos</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/')); ?>">Inicio</a></li>
                <li class="active">Lista de Modelos</li>
                <li><a href="<?php echo e(url('modelos/create')); ?>">Adicionar Modelos</a></li>
            </ol>               
    </div>
    <?php echo Form::open(['url' => 'modelos', 'method' => 'get', 'class' => 'form-inline text-center']); ?>

    <div id="page-inner"> 
        <div class="form-group">
            <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
            <input type="text" class="form-control" name="nome" placeholder="Ex: Nome">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    <?php echo Form::close(); ?>

      <div class="col-md-12">
            <!--   Basic Table  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                          Lista de Modelos
                    </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                <tr>
                                    <td>ID</td>
                                    <td>Nome</td>
                                    <td class="col-md-2 "></td>
                                </tr>
                                <?php $__currentLoopData = $modelo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modelo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($modelo->idModelo); ?></td>
                                        <td><?php echo e($modelo->nome); ?></td>
                                        <td>
                                            <div role="group" class="btn-group">
                                                <?php echo Form::open(['url' => 'modelos/'.$modelo->idModelo, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse Modelo?");']); ?>

                                                    <button class="btn btn-warning btn-xs" href="modelos/<?php echo e($modelo->idModelo); ?>/edit">
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </button>
                                                   <?php echo Form::close(); ?>

                                            </div>
                                            <div role="group" class="btn-group">
                                                 <?php echo Form::open(['url' => 'modelos/'.$modelo->idModelo, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse Modelo?");']); ?>

                                                <button type="submit" name="nada" class="btn btn-danger btn-xs">
                                                    <span class="glyphicon glyphicon-trash" ></span>
                                                </button>
                                                <?php echo Form::close(); ?>

                                            </div>

                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                       </div>
                    <div class="panel-body" align="left">
                        <a href="modelos/create">
                            <button type="button" class="btn btn-primary">Cadastrar Modelo</button>
                         </a>
                    </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.padrao', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>