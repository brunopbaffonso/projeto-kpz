<?php $__env->startSection('content'); ?>
    <div id="page-wrapper">

        <div class="header">
            <h1 class="page-header">Itens</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/')); ?>">Inicio</a></li>
                <li><a href="<?php echo e(url('items')); ?>">Listar Itens</a></li>
                <li class="active"><a>Adicionar Item</a></li>
            </ol>
        </div>

        <div id="page-inner">

                <div id="error-div" class='alert-danger'>
                    <ul id="error-page">
                    </ul>
                </div>

            <?php if(Session::has('mensagem')): ?>
            <!-- mostra este bloco se existe uma chave na sessão chamada mensagens-sucesso -->
                <div class='alert alert-success'>
                    <?php if(is_array(Session::get('mensagem'))): ?>
                        <ul>
                            <?php $__currentLoopData = Session::get('mensagem'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($msg); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php else: ?>
                        <?php echo e(Session::get('mensagem')); ?>

                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="card-title">
                                <div class="title">Novo Item</div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php echo Form::open(['url' => 'items/', 'method' => 'post', 'enctype' => 'multipart/form-data']); ?>

                                
                                    <input type="hidden" name="os_idOs" value="<?php echo e($OS); ?>">
                            <div class="form-horizontal" for="quantidade" class="col-md-2 control-label">Código OS:</label>  <?php echo e($OS); ?>



                                    <div class="form-group row">
                                        <label for="idModelo" class="col-md-2 control-label">Fornecedor:</label>
                                        <div class="col-md-8" name="idModelo">
                                            <select name="idModelo" class="form-control form-control-lg">
                                                <?php $__currentLoopData = $modelos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modelo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <option value="<?php echo e($modelo->idModelo); ?>" class="dropdown-item"><?php echo e($modelo->nome); ?></option>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group<?php echo e($errors->has('quantidade') ? ' has-error' : ''); ?>">
                                        <label for="quantidade" class="col-md-2 control-label">Quantidade:</label>

                                        <div class="col-md-8">
                                            <input id="quantidade" type="text" class="form-control" name="quantidade" value="<?php echo e(old('quantidade')); ?>" pattern="[0-9]+$" placeholder="Ex: 1(tapete)/10 (chinelos)" ata-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9" required autofocus>

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
                                            <input id="comprimento" type="text" class="form-control" name="comprimento" value="<?php echo e(old('comprimento')); ?>" placeholder="Ex: 0.60/0.90" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9 separado por ponto" required autofocus>

                                            <?php if($errors->has('comprimento')): ?>
                                                <span class="help-block">
                                        <strong><?php echo e($errors->first('comprimento')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group<?php echo e($errors->has('largura') ? ' has-error' : ''); ?>">
                                        <label for="comprimento" class="col-md-2 control-label">Largura:</label>

                                        <div class="col-md-8">
                                            <input id="largura" type="text" class="form-control" name="largura" value="<?php echo e(old('largura')); ?>" placeholder="Ex: 0.60/0.90" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9 separado por ponto" required autofocus>

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
                                                <option value="mm" class="dropdown-item">mm (Milimetro)</option>
                                                <option value="cm" class="dropdown-item">cm (Centimetros)</option>
                                                <option value="dm" class="dropdown-item">dm (Decimetros)</option>
                                                <option value="m" class="dropdown-item">m (Metros)</option>
                                                <option value="dam" class="dropdown-item">dam (Decametros)</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                    <label for="modelo_idBorda" class="col-md-2 control-label">*Borda:</label>
                                    <div class="col-md-8">
                                            <select name="idBorda" class="form-control form-control-lg">
                                                <option value="0" class="form-control">Sem Borda</option>
                                                <option value="1" class="form-control">Pintada</option>
                                                <option value="2" class="form-control">Vulcanizada</option>
                                                <option value="3" class="form-control">Rebaixada</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group<?php echo e($errors->has('arte') ? ' has-error' : ''); ?>">
                                        <label for="arte" class="col-md-2 control-label">Arte:</label>

                                        <div class="col-md-8">
                                            <input id="arte" type="file" name="arte" value="<?php echo e(old('arte')); ?>" data-toggle="tooltip" data-placement="top" title="Tooltip on top" autofocus>

                                            <?php if($errors->has('arte')): ?>
                                                <span class="help-block">
                                        <strong><?php echo e($errors->first('arte')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group<?php echo e($errors->has('precoUnit') ? ' has-error' : ''); ?>">
                                        <label for="precoUnit" class="col-md-2 control-label">Preço Unitário:</label>

                                        <div class="col-md-8">
                                            <input id="precoUnit" type="text" class="form-control" name="precoUnit" value="<?php echo e(old('precoUnit')); ?>" placeholder="Ex: 10.00/300.50" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9 separado por ponto" required autofocus>

                                            <?php if($errors->has('precoUnit')): ?>
                                                <span class="help-block">
                                        <strong><?php echo e($errors->first('precoUnit')); ?></strong>
                                        </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                        <div class="form-group">
                                            <div class="col-md-4 col-md-offset-2">
                                                <button type="submit" name="submit" value="0" class="btn btn-primary">
                                                    Cadastrar Novo Item
                                                </button>

                                                <button type="submit" name="submit" value="1" class="btn btn-success">
                                                    Cadastrar & Finalizar!
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
        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.padrao', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>