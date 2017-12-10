<?php $__env->startSection('content'); ?>
    <div id="page-wrapper">

        <div class="header">
            <h1 class="page-header">Adicionar Ordem de Serviço</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/')); ?>">Inicio</a></li>
                <li><a href="<?php echo e(url('oss')); ?>  ">Listar OS</a></li>
                <li class="active">Adicionar OS</li>
            </ol>
        </div>

        <div id="page-inner">

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="card-title">
                                <div class="title">Nova Ordem de Serviço</div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-horizontal">
                                <?php echo Form::open(['url' => 'oss/', 'method' => 'post']); ?>


                                <input id="status" type="hidden" class="form-control" name="status" value="Aberta">

                                <div class="form-group row">
                                    <label for="idCliente" class="col-md-2 control-label">*Cliente:</label>
                                    <div class="col-md-8" name="idCliente">
                                        <select name="idCliente" class="form-control form-control-lg">
                                            <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <option value=<?php echo e($cliente->idCliente); ?> class="dropdown-item"><?php echo e($cliente->nome); ?></option>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group<?php echo e($errors->has('contato') ? ' has-error' : ''); ?>">
                                    <label for="contato" class="col-md-2 control-label">Contato</label>

                                    <div class="col-md-8">
                                        <input id="contato" type="text" class="form-control" name="contato" value="<?php echo e(old('contato')); ?>" data-toggle="tooltip" data-placement="top" title="Tooltip on top" required autofocus>

                                        <?php if($errors->has('contato')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('contato')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('formaPgto') ? ' has-error' : ''); ?>">
                                    <label for="formaPgto" class="col-md-2 control-label">Forma de Pagamento:</label>

                                    <div class="col-md-8">
                                        <input id="formaPgto" type="text" class="form-control" name="formaPgto" value="<?php echo e(old('formaPgto')); ?>" data-toggle="tooltip" data-placement="top" title="Tooltip on top" required autofocus>

                                        <?php if($errors->has('formaPgto')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('formaPgto')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('observacoes') ? ' has-error' : ''); ?>">
                                    <label for="observacoes" class="col-md-2 control-label">Observações:</label>

                                    <div class="col-md-8">
                                        <textarea id="observacoes" class="form-control" name="observacoes" value="<?php echo e(old('observacoes')); ?>" data-toggle="tooltip" data-placement="top" title="Tooltip on top" autofocus ></textarea>

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
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.padrao', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>