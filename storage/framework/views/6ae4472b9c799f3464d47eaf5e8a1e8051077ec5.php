<?php $__env->startSection('content'); ?>
    <div id="page-wrapper">

        <div class="header">
            <h1 class="page-header">Adicionar Insumo</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/')); ?>">Inicio</a></li>
                <li><a href="<?php echo e(url('insumos')); ?>">Listar Insumos</a></li>
                <li class="active">Adicionar Insumo</li>
            </ol>
        </div>

        <div id="page-inner">

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="card-title">
                                <div class="title">Editar Insumos</div>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="form-horizontal">
                                <?php echo Form::open(['url' => 'insumos/'.$insumo->idInsumo, 'method' => 'put']); ?>


                                <div class="form-group<?php echo e($errors->has('nome') ? ' has-error' : ''); ?>">
                                    <label for="nome" class="col-md-2 control-label">Descrição:</label>

                                    <div class="col-md-8">
                                        <input id="nome" type="text" class="form-control" name="nome" value="<?php echo e($insumo->nome); ?>" placeholder="Ex: Manta/Tinta"  data-toggle="tooltip" data-placement="top" title="Esse campo aceita somente caracteres minúsculo/MAIÚSCULOS" required autofocus>

                                        <?php if($errors->has('nome')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($insumo->nome); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('quantidade') ? ' has-error' : ''); ?>">
                                    <label for="quantidade" class="col-md-2 control-label">Quantidade:</label>

                                    <div class="col-md-8">
                                        <input id="quantidade" type="text" class="form-control" name="quantidade" value="<?php echo e($insumo->quantidade); ?>" placeholder="Ex: 1 (Rolo)/10 (Latas)" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9" required autofocus>

                                        <?php if($errors->has('quantidade')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($insumo->quantidade); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('comprimento') ? ' has-error' : ''); ?>">
                                    <label for="comprimento" class="col-md-2 control-label">Comprimento:</label>

                                    <div class="col-md-8">
                                        <input id="comprimento" type="text" class="form-control" name="comprimento" value="<?php echo e($insumo->comprimento); ?>" placeholder="Ex: 0.60/0.90" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9 separado por ponto" required autofocus>

                                        <?php if($errors->has('comprimento')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($insumo->comprimento); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('largura') ? ' has-error' : ''); ?>">
                                    <label for="largura" class="col-md-2 control-label">Largura:</label>

                                    <div class="col-md-8">
                                        <input id="largura" type="text" class="form-control" name="largura" value="<?php echo e($insumo->largura); ?>" placeholder="Ex: 0.60/0.90" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9 separado por ponto" required autofocus>

                                        <?php if($errors->has('largura')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($insumo->largura); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="unidadeMedida" class="col-md-2 control-label">*Unidade Medida:</label>
                                    <div class="col-md-8" name="unidadeMedida">
                                        <select name="unidadeMedida" class="form-control form-control-lg">
                                            <?php if($insumo->unidadeMedida == 'mm'): ?>
                                                <option value="mm" class="dropdown-item" selected>mm (Milimetro)</option>
                                            <?php else: ?>
                                                <option value="mm" class="dropdown-item">mm (Milimetro)</option>
                                            <?php endif; ?>
                                            <?php if($insumo->unidadeMedida == 'cm'): ?>
                                                <option value="cm" class="dropdown-item" selected>cm (Centimetros)</option>
                                            <?php else: ?>
                                                <option value="cm" class="dropdown-item">cm (Centimetros)</option>
                                            <?php endif; ?>
                                            <?php if($insumo->unidadeMedida == 'dm'): ?>
                                                <option value="dm" class="dropdown-item" selected>dm (Decimetros)</option>
                                            <?php else: ?>
                                                <option value="dm" class="dropdown-item">dm (Decimetros)</option>
                                            <?php endif; ?>
                                            <?php if($insumo->unidadeMedida == 'm'): ?>
                                                <option value="m" class="dropdown-item" selected>m (Metros)</option>
                                            <?php else: ?>
                                                <option value="m" class="dropdown-item">m (Metros)</option>
                                            <?php endif; ?>
                                            <?php if($insumo->unidadeMedida == 'dam'): ?>
                                                <option value="dam" class="dropdown-item" selected>dam (Decametros)</option>
                                            <?php else: ?>
                                                <option value="dam" class="dropdown-item">dam (Decametros)</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group<?php echo e($errors->has('precoUnit') ? ' has-error' : ''); ?>">
                                    <label for="precoUnit" class="col-md-2 control-label">Preço Unitário:</label>

                                    <div class="col-md-8">
                                        <input id="precoUnit" type="text" class="form-control"  value="<?php echo e($insumo->precoUnit); ?>" name="precoUnit" placeholder="Ex: R$ 10.00/ R$270.55" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9 separado por ponto" required autofocus>

                                        <?php if($errors->has('precoUnit')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($insumo->precoUnit); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cor" class="col-md-2 control-label">Cor:</label>
                                    <div class="col-md-8" name="cor_idCor">
                                        <select class="form-control form-control-lg">
                                            <?php $__currentLoopData = $cor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($c->idCor == $insumo->cor_idCor ): ?>
                                                    <option value="<?php echo e($c->idCor); ?>" class="dropdown-item" selected><?php echo e($c->nome); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($c->idCor); ?>" class="dropdown-item"><?php echo e($c->nome); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="idTipoManta" class="col-md-2 control-label">*Tipo Manta:</label>
                                    <div class="col-md-8" name="idTipoManta">
                                        <select name="idTipoManta" class="form-control form-control-lg">
                                            <?php $__currentLoopData = $tipoManta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($m->idTipoManta == $insumo->tipoManta_idTipoManta ): ?>
                                                    <option value="<?php echo e($m->idTipoManta); ?>" class="dropdown-item" selected><?php echo e($m->nome); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($m->idTipoManta); ?>" class="dropdown-item"><?php echo e($m->nome); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="idTipoMaterial" class="col-md-2 control-label">*Tipo Material:</label>
                                    <div class="col-md-8" name="idTipoMaterial">
                                        <select name="idTipoMaterial" class="form-control form-control-lg">
                                            <?php $__currentLoopData = $tipoMaterial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($m2->idTipoMaterial == $insumo->tipoMaterial_idTipoMaterial ): ?>
                                                    <option value="<?php echo e($m2->idTipoMaterial); ?>" class="dropdown-item" selected><?php echo e($m2->nome); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($m2->idTipoMaterial); ?>" class="dropdown-item"><?php echo e($m2->nome); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="idFornecedor" class="col-md-2 control-label">*Fornecedor:</label>
                                    <div class="col-md-8" name="idFornecedor">
                                        <select name="idFornecedor" class="form-control form-control-lg">
                                            <?php $__currentLoopData = $fornecedor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($f->idFornecedor == $insumo->fornecedor_idFornecedor ): ?>
                                                    <option value="<?php echo e($f->idFornecedor); ?>" class="dropdown-item" selected><?php echo e($f->nome); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($f->idFornecedor); ?>" class="dropdown-item"><?php echo e($f->nome); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <br/>

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