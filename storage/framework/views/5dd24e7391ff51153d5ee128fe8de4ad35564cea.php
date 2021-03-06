<?php $__env->startSection('content'); ?>
   <div id="page-wrapper">

    <div class="header"> 
        <h1 class="page-header">Editar Modelo</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/')); ?>">Inicio</a></li>
                <li><a href="<?php echo e(url('modelos')); ?> ">Lista de Modelos</a></li>
                <li class="active">Adicionar Modelo</li>
            </ol>               
    </div>

    <div id="page-inner">

        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="card-title">
                            <div class="title">Editar Modelo</div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="form-horizontal">
                        <?php echo Form::open(['url' => 'modelos/'.$modelo->idModelo, 'method' => 'put']); ?>


                        <div class="form-group<?php echo e($errors->has('nome') ? ' has-error' : ''); ?>">
                            <label for="nome" class="col-md-2 control-label">Nome</label>

                            <div class="col-md-8">
                                <input id="nome" type="text" class="form-control" name="nome" value="<?php echo e($modelo->nome); ?>" required autofocus>

                                <?php if($errors->has('nome')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nome')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">
                                    Salvar Alterações
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