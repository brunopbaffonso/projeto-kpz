<?php $__env->startSection('content'); ?>
    <div id="page-wrapper">

        <div class="header">
            <h1 class="page-header">Adicionar Subproduto</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/')); ?>">Inicio</a></li>
                <li><a href="<?php echo e(url('subprodutos')); ?>">Listar Subprodutos</a></li>
                <li class="active">Adicionar Subproduto</li>
            </ol>
        </div>

        <div id="page-inner">

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="card-title">
                                <div class="title">Editando Subproduto</div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-horizontal">
                                <?php echo Form::open(['url' => 'subprodutos/'.$subproduto->idSubproduto, 'method' => 'put']); ?>

                                <div class="form-group<?php echo e($errors->has('tipo') ? ' has-error' : ''); ?>">
                                    <label for="tipo" class="col-md-2 control-label">*Descrição:</label>

                                    <div class="col-md-8">
                                        <input id="tipo" type="text" class="form-control" name="tipo" value="<?php echo e($subproduto->tipo); ?>" placeholder="chinelo Preto/ chaveiro" maxlength="255" pattern="[a-zA-Z\s]+$" data-toggle="tooltip" data-placement="top" title="Esse campo aceita somente caracteres minúsculo/MAIÚSCULOS" required autofocus>

                                        <?php if($errors->has('tipo')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('tipo')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('quantidade') ? ' has-error' : ''); ?>">
                                    <label for="quantidade" class="col-md-2 control-label">*Quantidade:</label>

                                    <div class="col-md-8">
                                        <input id="quantidade" type="text" class="form-control" name="quantidade" value="<?php echo e($subproduto->quantidade); ?>" laceholder="Ex: 1 (Rolo)/10 (Latas)" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9" required autofocus>

                                        <?php if($errors->has('quantidade')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('quantidade')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('comprimento') ? ' has-error' : ''); ?>">
                                    <label for="comprimento" class="col-md-2 control-label">Comprimento:</label>

                                    <div class="col-md-8">
                                        <input id="comprimento" type="text" class="form-control" name="comprimento" value="<?php echo e($subproduto->comprimento); ?>" placeholder="Ex: 0.60/0.90" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9 separado por ponto" required autofocus>

                                        <?php if($errors->has('comprimento')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('comprimento')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('largura') ? ' has-error' : ''); ?>">
                                    <label for="largura" class="col-md-2 control-label">Largura:</label>

                                    <div class="col-md-8">
                                        <input id="largura" type="text" class="form-control" name="largura" value="<?php echo e($subproduto->largura); ?>" placeholder="Ex: 0.60/0.90" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9 separado por ponto" required autofocus>

                                        <?php if($errors->has('largura')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('largura')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="unidadeMedida" class="col-md-2 control-label">*Unidade Medida:</label>
                                    <div class="col-md-8" name="unidadeMedida">
                                        <select name="unidadeMedida" class="form-control form-control-lg">
                                            <?php if($subproduto->unidadeMedida == 'mm'): ?>
                                                <option value="mm" class="dropdown-item" selected>mm (Milimetro)</option>
                                            <?php else: ?>
                                                <option value="mm" class="dropdown-item">mm (Milimetro)</option>
                                            <?php endif; ?>
                                            <?php if($subproduto->unidadeMedida == 'cm'): ?>
                                                <option value="cm" class="dropdown-item" selected>cm (Centimetros)</option>
                                            <?php else: ?>
                                                <option value="cm" class="dropdown-item">cm (Centimetros)</option>
                                            <?php endif; ?>
                                            <?php if($subproduto->unidadeMedida == 'dm'): ?>
                                                <option value="dm" class="dropdown-item" selected>dm (Decimetros)</option>
                                            <?php else: ?>
                                                <option value="dm" class="dropdown-item">dm (Decimetros)</option>
                                            <?php endif; ?>
                                            <?php if($subproduto->unidadeMedida == 'm'): ?>
                                                <option value="m" class="dropdown-item" selected>m (Metros)</option>
                                            <?php else: ?>
                                                <option value="m" class="dropdown-item">m (Metros)</option>
                                            <?php endif; ?>
                                            <?php if($subproduto->unidadeMedida == 'dam'): ?>
                                                <option value="dam" class="dropdown-item" selected>dam (Decametros)</option>
                                            <?php else: ?>
                                                <option value="dam" class="dropdown-item">dam (Decametros)</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cor" class="col-md-2 control-label">Cor:</label>
                                    <div class="col-md-8" name="cor_idCor">
                                        <select class="form-control form-control-lg">
                                            <?php $__currentLoopData = $cor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($c->idCor == $subproduto->cor_idCor ): ?>
                                                    <option value="<?php echo e($c->idCor); ?>" class="dropdown-item" selected><?php echo e($c->nome); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($c->idCor); ?>" class="dropdown-item"><?php echo e($c->nome); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <br />

                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-2">
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