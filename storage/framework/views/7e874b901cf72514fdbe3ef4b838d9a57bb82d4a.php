<?php $__env->startSection('content'); ?>
    <div id="page-wrapper" >
        <div class="header">
            <h1 class="page-header">Itens</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/')); ?>">Inicio</a></li>
                <li class="active">Listar Itens</li>
                <li><a href="<?php echo e(url('items/create')); ?>">Adicionar Item</a></li>
            </ol>
        </div>
        <div class="col-md-12">
            <!--   Basic Table  -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de Itens
                </div>
                <div class="panel-body">
                    <?php echo $grid->make(); ?>

                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.padrao', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>