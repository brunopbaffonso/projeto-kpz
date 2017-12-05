<?php $__env->startSection('content'); ?>
    <div id="page-wrapper">

        <div class="header">
            <h1 class="page-header">Adicionar Subproduto</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/')); ?>">Inicio</a></li>
                <li><a href="<?php echo e(url('subprodutos')); ?>">Lista de Subprodutos</a></li>
                <li class="active">Adicionar Subproduto</li>
            </ol>
        </div>

        <div id="page-inner">

        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="card-title">
                            <div class="title">Novo Subproduto</div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-horizontal">
                            <?php echo Form::open(['url' => 'subprodutos/'.$subproduto->idSubproduto, 'method' => 'put']); ?>

                            <div class="form-group<?php echo e($errors->has('tipo') ? ' has-error' : ''); ?>">
                                <label for="tipo" class="col-md-4 control-label">Tipo:</label>

                                <div class="col-md-6">
                                    <input id="tipo" type="text" class="form-control" name="tipo" value="<?php echo e($subproduto->tipo); ?>" required autofocus>

                                    <?php if($errors->has('tipo')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('tipo')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('quantidade') ? ' has-error' : ''); ?>">
                                <label for="quantidade" class="col-md-4 control-label">Quantidade:</label>

                                <div class="col-md-6">
                                    <input id="quantidade" type="number" class="form-control" name="quantidade" value="<?php echo e($subproduto->quantidade); ?>" required autofocus>

                                    <?php if($errors->has('quantidade')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('quantidade')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('comprimento') ? ' has-error' : ''); ?>">
                                <label for="comprimento" class="col-md-4 control-label">Comprimento:</label>

                                <div class="col-md-6">
                                    <input id="comprimento" type="number" class="form-control" name="comprimento" value="<?php echo e($subproduto->comprimento); ?>" required autofocus>

                                    <?php if($errors->has('comprimento')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('comprimento')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('largura') ? ' has-error' : ''); ?>">
                                <label for="largura" class="col-md-4 control-label">Largura:</label>

                                <div class="col-md-6">
                                    <input id="largura" type="number" class="form-control" name="largura" value="<?php echo e($subproduto->largura); ?>" required autofocus>

                                    <?php if($errors->has('largura')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('largura')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('unidadeMedida') ? ' has-error' : ''); ?>">
                                <label for="unidadeMedida" class="col-md-4 control-label">Unidade Medida:</label>

                                <div class="col-md-6">
                                    <input id="unidadeMedida" type="text" class="form-control" name="unidadeMedida" value="<?php echo e($subproduto->unidadeMedida); ?>" required autofocus>

                                    <?php if($errors->has('unidadeMedida')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('unidadeMedida')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('cor_idCor') ? ' has-error' : ''); ?>">
                                <label for="cor_idCor" class="col-md-4 control-label">Cor:</label>

                                <div class="col-md-6">
                                    <input id="cor_idCor" type="number" class="form-control" name="cor_idCor" value="<?php echo e($subproduto->cor_idCor); ?>" required autofocus>

                                    <?php if($errors->has('cor_idCor')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('cor_idCor')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Salvar Alterações!
                                    </button>
                                </div>
                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.padrao', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>