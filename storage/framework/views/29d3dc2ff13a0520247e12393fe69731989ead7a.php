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
                                <?php echo Form::open(['url' => 'oss/'.$os->idOS, 'method' => 'put']); ?>



                                <div class="form-group row">
                                    <div class="col-md-8" name="cor_idCor">
                                        <label for="status" class="col-md-2 control-label">Status</label>
                                        <select name="status" class="form-control form-control-lg">
                                            <?php if($os->status == 'Aberta'): ?>
                                                <option value="Aberta" class="dropdown-item" selected>Aberta</option>
                                            <?php else: ?>
                                                <option value="Aberta" class="dropdown-item">Aberta</option>
                                            <?php endif; ?>
                                            <?php if($os->status == 'Executando'): ?>
                                                <option value="Executando" class="dropdown-item" selected>Executando</option>
                                            <?php else: ?>
                                                <option value="Executando" class="dropdown-item">Executando</option>
                                            <?php endif; ?>
                                            <?php if($os->status == 'Concluida'): ?>
                                                <option value="Concluida" class="dropdown-item" selected>Concluida</option>
                                            <?php else: ?>
                                                <option value="Concluida" class="dropdown-item">Concluida</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="idCliente" class="col-md-2 control-label">*Cliente:</label>
                                    <div class="col-md-8" name="idCliente">
                                        <select name="idCliente" class="form-control form-control-lg">
                                            <?php $__currentLoopData = $cliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($c->idCliente == $os->cliente_idCliente ): ?>
                                                    <option value="<?php echo e($c->idCliente); ?>" class="dropdown-item" selected><?php echo e($c->nome); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($c->idCliente); ?>" class="dropdown-item"><?php echo e($c->nome); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('contato') ? ' has-error' : ''); ?>">
                                    <label for="contato" class="col-md-2 control-label">Contato:</label>

                                    <div class="col-md-8">
                                        <input id="contato" type="text" class="form-control" name="contato" value="<?php echo e($os->contato); ?>" data-toggle="tooltip" data-placement="top" title="Tooltip on top" autofocus>

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
                                        <input id="formaPgto" type="text" class="form-control" name="formaPgto" value="<?php echo e($os->formaPgto); ?>" data-toggle="tooltip" data-placement="top" title="Tooltip on top" required autofocus>

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
                                        <textarea id="observacoes" class="form-control" name="observacoes" value="<?php echo e($os->observacoes); ?>" data-toggle="tooltip" data-placement="top" title="Tooltip on top" autofocus></textarea>

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
                                            Salvar Alterações!
                                        </button>
                                    </div>
                                </div>

 
                                <?php echo Form::close(); ?>

                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Quantidade</th>
                                        <th>Largura</th>
                                        <th>Comprimento</th>
                                        <th>Unidade de Medida</th>
                                        <th>Borda</th>
                                        <th>Preço Unitario</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $os->item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($item->quantidade); ?></td>
                                            <td><?php echo e($item->largura); ?></td>
                                            <td><?php echo e($item->comprimento); ?></td>
                                            <td><?php echo e($item->unidadeMedida); ?></td>
                                            <td><?php echo e($item->borda); ?></td>
                                            <td><?php echo e($item->precoUnit); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.padrao', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>