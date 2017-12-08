<?php $__env->startSection('content'); ?>
    <div id="page-wrapper">

        <div class="header">
            <h1 class="page-header">Adicionar Cliente</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/')); ?>">Inicio</a></li>
                <li><a href="<?php echo e(url('Clientes')); ?> ">Listar Clientes</a></li>
                <li class="active">Adicionar Cliente</li>
            </ol>
        </div>

        <div id="page-inner">

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="card-title">
                                <div class="title">Novo Cliente</div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-horizontal">
                                <?php echo Form::open(['url' => 'clientes/'.$cliente->idCliente, 'method' => 'put']); ?>


                                <div class="form-group<?php echo e($errors->has('nome') ? ' has-error' : ''); ?>">
                                    <label for="nome" class="col-md-2 control-label">*Nome:</label>

                                    <div class="col-md-8">
                                        <input id="nome" type="text" class="form-control" name="nome" value="<?php echo e($cliente->nome); ?>" placeholder="Kapazi LTDA" maxlength="255" pattern="[a-zA-Z\s]+$" data-toggle="tooltip" data-placement="top" title="Esse campo aceita somente caracteres minusculos/MAIUSCULOS" required autofocus>

                                        <?php if($errors->has('nome')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($cliente->nome); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('cnpj') ? ' has-error' : ''); ?>">
                                    <label for="cnpj" class="col-md-2 control-label">*CNPJ:</label>

                                    <div class="col-md-8">
                                        <input id="cnpj" type="text" class="form-control" name="cnpj" value="<?php echo e($cliente->cnpj); ?>" data-toggle="tooltip" data-placement="top" title="Esse campo só aceita números de 0 a 9" required autofocus>

                                        <?php if($errors->has('cnpj')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($cliente->cnpj); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('ie') ? ' has-error' : ''); ?>">
                                    <label for="ie" class="col-md-2 control-label">IE:</label>

                                    <div class="col-md-8">
                                        <input id="ie" type="text" class="form-control" name="ie" value="<?php echo e($cliente->ie); ?>" data-toggle="tooltip" data-placement="top" title="Esse campo só aceita números de 0 a 9" autofocus>

                                        <?php if($errors->has('ie')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($cliente->ie); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('cep') ? ' has-error' : ''); ?>">
                                    <label for="cep" class="col-md-2 control-label">CEP:</label>

                                    <div class="col-md-8">
                                        <input id="cep" type="text" class="form-control" value="<?php echo e($cliente->cep); ?>" name="cep" data-toggle="tooltip" data-placement="top" title="Esse campo só aceita números de 0 a 9" autofocus>

                                        <?php if($errors->has('cep')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($cliente->cep); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('endereco') ? ' has-error' : ''); ?>">
                                    <label for="endereco" class="col-md-2 control-label">*Endereço:</label>

                                    <div class="col-md-8">
                                        <input id="endereco" type="text" class="form-control"  value="<?php echo e($cliente->endereco); ?>" name="endereco" data-toggle="tooltip" data-placement="top" title="Esse campo aceita somente caracteres minusculos/MAIUSCULOS" required autofocus>

                                        <?php if($errors->has('endereco')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($cliente->endereco); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('bairro') ? ' has-error' : ''); ?>">
                                    <label for="bairro" class="col-md-2 control-label">*Bairro:</label>

                                    <div class="col-md-8">
                                        <input id="bairro" type="text" class="form-control" value="<?php echo e($cliente->bairro); ?>" name="bairro" data-toggle="tooltip" data-placement="top" title="Esse campo aceita somente caracteres minusculos/MAIUSCULOS" required autofocus>

                                        <?php if($errors->has('bairro')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($cliente->bairro); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('cidade_idCidade') ? ' has-error' : ''); ?>">
                                    <label for="bairro" class="col-md-2 control-label">*Cidade:</label>

                                    <div class="col-md-8">
                                        <input id="cidade_idCidade" type="text" class="form-control" value="<?php echo e($cliente->cidade_idCidade); ?>" data-toggle="tooltip" data-placement="top" title="Esse campo aceita somente caracteres minusculos/MAIUSCULOS" name="cidade_idCidade" required autofocus>

                                        <?php if($errors->has('cidade_idCidade')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($cliente->cidade_idCidade); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('estado_uf') ? ' has-error' : ''); ?>">
                                    <label for="bairro" class="col-md-2 control-label">*Estado:</label>

                                    <div class="col-md-8">
                                        <input id="estado_uf" type="text" class="form-control" value="<?php echo e($cliente->estado_uf); ?>" data-toggle="tooltip" data-placement="top" title="Esse campo aceita somente caracteres MAIUSCULOS" name="estado_uf" required autofocus>

                                        <?php if($errors->has('estado_uf')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($cliente->estado_uf); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('fone') ? ' has-error' : ''); ?>">
                                    <label for="fone" class="col-md-2 control-label">Telefone:</label>

                                    <div class="col-md-8">
                                        <input id="fone" type="text" class="form-control" value="<?php echo e($cliente->fone); ?>" name="fone" data-toggle="tooltip" data-placement="top" title="Esse campo aceita somente numeros 0 a 9" autofocus>

                                        <?php if($errors->has('fone')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($cliente->fone); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('celular') ? ' has-error' : ''); ?>">
                                    <label for="celular" class="col-md-2 control-label">*Celular:</label>

                                    <div class="col-md-8">
                                        <input id="celular" type="text" class="form-control" name="celular" value="<?php echo e($cliente->celular); ?>" data-toggle="tooltip" data-placement="top" title="Esse campo aceita somente numeros 0 a 9" required autofocus>

                                        
                                        
                                        
                                        
                                        
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                    <label for="email" class="col-md-2 control-label">*E-Mail:</label>

                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control" name="email" value="<?php echo e($cliente->email); ?>" data-toggle="tooltip" data-placement="top" title="Esse campo aceita somente caracteres minusculo,MAIUSCULOS e caracteres especiais. Obrigatorio o uso de @!" required autofocus>

                                        <?php if($errors->has('email')): ?>
                                         <span class="help-block">
                                            <strong><?php echo e($cliente->email); ?></strong>
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

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.padrao', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>