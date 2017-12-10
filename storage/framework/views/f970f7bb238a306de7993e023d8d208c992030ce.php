<?php $__env->startSection('content'); ?>
    <div id="page-wrapper">

        <div class="header">
            <h1 class="page-header">Adicionar Modelo</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/')); ?>">Inicio</a></li>
                <li><a href=" <?php echo e(url('modelos')); ?>">Listar Modelos</a></li>
                <li class="active">Adicionar Modelo</li>
            </ol>
        </div>

        <div id="page-inner">

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="card-title">
                                <div class="title">Novo Modelo</div>
                            </div>
                        </div>
                        <div class="panel-body">
                        
                                <?php echo Form::open(['url' => 'modelos/', 'method' => 'post']); ?>

                                
                                <input id="ativo" type="hidden" class="form-control" name="ativo" value="1">

                                <div class="form-group<?php echo e($errors->has('nome') ? ' has-error' : ''); ?>">
                                    <label for="nome" class="col-md-2 control-label">Nome:</label>

                                    <div class="col-md-8">
                                        <input id="nome" type="text" class="form-control" name="nome" value="<?php echo e(old('nome')); ?>" placeholder="Tapete/Chinelo" maxlength="255" pattern="[a-zA-Z\s]+$" data-toggle="tooltip" data-placement="top" title="Esse campo aceita somente caracteres minúsculo/MAIÚSCULOS" required autofocus>

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