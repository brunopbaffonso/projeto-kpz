<?php $__env->startSection('content'); ?>
    <div id="page-wrapper" >
        <div class="header">
            <h1 class="page-header">Ordem de Serviço</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/')); ?>">Inicio</a></li>
                <li class="active">Listar OS</li>
                <li><a href="<?php echo e(url('oss/create')); ?>">Adicionar OS</a></li>
            </ol>
        </div>
        <div class="col-md-12">
            <!--   Basic Table  -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de Ordem de Serviço
                </div>
                <div class="panel-body">
                    <?php echo $grid->make(); ?>

                </div>
                <div class="panel-body" align="left">
                    <a href="oss/create">
                        <button type="button" class="btn btn-primary">Cadastrar Os</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.padrao', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>