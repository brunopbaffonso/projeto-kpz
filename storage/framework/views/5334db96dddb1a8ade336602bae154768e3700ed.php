<?php $__env->startSection('content'); ?>
<div id="page-wrapper">

    <div class="header"> 
        <h1 class="page-header">Adicionar Insumo</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/')); ?>">Inicio</a></li>
                <li><a href="<?php echo e(url('insumos')); ?>">Lista de Insumos</a></li>
                <li class="active">Adicionar Insumo</li>
            </ol>               
    </div>

    <div id="page-inner">

        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="card-title">
                            <div class="title">Novo Insumo</div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                        <?php echo Form::open(['url' => 'insumos/', 'method' => 'post']); ?>


                            <div class="form-group<?php echo e($errors->has('quantidade') ? ' has-error' : ''); ?>">
                                <label for="quantidade" class="col-md-2 control-label">Quantidade</label>

                                <div class="col-md-8">
                                    <input id="quantidade" type="number" class="form-control" name="quantidade" value="<?php echo e(old('quantidade')); ?>" required autofocus>

                                    <?php if($errors->has('quantidade')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('quantidade')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('comprimento') ? ' has-error' : ''); ?>">
                                <label for="comprimento" class="col-md-2 control-label">Comprimento</label>

                                <div class="col-md-8">
                                    <input id="comprimento" type="number" class="form-control" name="comprimento" value="<?php echo e(old('comprimento')); ?>" required autofocus>

                                    <?php if($errors->has('comprimento')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('comprimento')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('largura') ? ' has-error' : ''); ?>">
                                <label for="largura" class="col-md-2 control-label">Largura</label>

                                <div class="col-md-8">
                                    <input id="largura" type="number" class="form-control" name="largura" value="<?php echo e(old('largura')); ?>" required autofocus>

                                    <?php if($errors->has('largura')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('largura')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('unidadeMedida') ? ' has-error' : ''); ?>">
                                <label for="unidadeMedida" class="col-md-2 control-label">Unidade de Medida</label>

                                <div class="col-md-8">
                                    <input id="unidadeMedida" type="text" class="form-control" name="unidadeMedida" value="<?php echo e(old('unidadeMedida')); ?>" required autofocus>

                                    <?php if($errors->has('unidadeMedida')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('unidadeMedida')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('precoUnit') ? ' has-error' : ''); ?>">
                                <label for="precoUnit" class="col-md-2 control-label">Preço Unitário</label>

                                <div class="col-md-8">
                                    <input id="precoUnit" type="number" class="form-control" name="precoUnit" value="<?php echo e(old('precoUnit')); ?>" required autofocus>

                                    <?php if($errors->has('precoUnit')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('precoUnit')); ?></strong>
                                    precoUnit
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