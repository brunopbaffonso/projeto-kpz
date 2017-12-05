<?php $__env->startSection('content'); ?>
<div id="page-wrapper">

    <div class="header"> 
        <h1 class="page-header">Adicionar Ordem de Compra</h1>
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="<?php echo e(url('ocs')); ?>  ">Lista de Compra</a></li>
                <li class="active">Adicionar Ordem de Compra</li>
            </ol>               
    </div>

    <div id="page-inner">

        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="card-title">
                            <div class="title">Nova Ordem de Compra</div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                        <?php echo Form::open(['url' => 'ocs/', 'method' => 'post']); ?>


                            <div class="form-group<?php echo e($errors->has('tipo') ? ' has-error' : ''); ?>">
                                <label for="tipo" class="col-md-2 control-label">Tipo</label>

                                <div class="col-md-8">
                                    <input id="tipo" type="text" class="form-control" name="tipo" value="<?php echo e(old('tipo')); ?>" required autofocus>

                                    <?php if($errors->has('tipo')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('tipo')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('observacoes') ? ' has-error' : ''); ?>">
                                <label for="observacoes" class="col-md-2 control-label">Observações</label>

                                <div class="col-md-10">
                                    <textarea id="observacoes" type="text" class="form-control" name="observacoes" value="<?php echo e(old('observacoes')); ?>" autofocus ></textarea>

                                    <?php if($errors->has('observacoes')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('observacoes')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                        Cadastrar!
                                    </button>
                                </div>
                            </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.padrao', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>