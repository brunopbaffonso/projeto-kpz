<?php $__env->startSection('content'); ?>
    <div id="page-wrapper">

        <div class="header">
            <h1 class="page-header">Adicionar Cliente</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/')); ?>">Inicio</a></li>
                <li><a href="<?php echo e(url('clientes')); ?>">Listar Clientes</a></li>
                <li class="active">Adicionar Cliente</li>
            </ol>
        </div>

        <div id="page-inner">

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="card-title">
                                <div class="title">Editar Cliente</div>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="form-horizontal">
                            <?php echo Form::open(['url' => 'clientes/'.$cliente->idCliente, 'method' => 'put']); ?>


                            <input id="ativo" type="hidden" class="form-control" name="ativo" value="1">

                            <div class="form-group<?php echo e($errors->has('nome') ? ' has-error' : ''); ?>">
                                <label for="nome" class="col-md-2 control-label">Nome</label>

                                <div class="col-md-8">
                                    <input id="nome"  type="text" class="form-control" name="nome" value="<?php echo e($cliente->nome); ?>"  required autofocus>

                                    <?php if($errors->has('nome')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($cliente->nome); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('cpf') ? ' has-error' : ''); ?>">
                                <label for="cpf" class="col-md-2 control-label">CPF</label>

                                <div class="col-md-8">
                                    <input id="cpf" type="text" onKeyPress = "tecla()" class="form-control" name="cpf" value="<?php echo e($cliente->cpf); ?>" autofocus >

                                    <?php if($errors->has('cpf')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($cliente->cpf); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('cnpj') ? ' has-error' : ''); ?>">
                                <label for="cnpj" class="col-md-2 control-label">CNPJ</label>

                                <div class="col-md-8">
                                    <input id="cnpj" type="text" class="form-control" name="cnpj" value="<?php echo e($cliente->cnpj); ?>" autofocus>

                                    <?php if($errors->has('cnpj')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($cliente->cnpj); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('ie') ? ' has-error' : ''); ?>">
                                <label for="ie" class="col-md-2 control-label">I.E.</label>

                                <div class="col-md-8">
                                    <input id="ie" type="text" class="form-control" name="ie" value="<?php echo e($cliente->ie); ?>" autofocus>

                                    <?php if($errors->has('ie')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($cliente->ie); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('cep') ? ' has-error' : ''); ?>">
                                <label for="cep" class="col-md-2 control-label">CEP</label>

                                <div class="col-md-8">
                                    <input id="cep" type="text" name="cep" class="form-control"  value="<?php echo e($cliente->cep); ?>" name="cep" autofocus>

                                    <?php if($errors->has('cep')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($cliente->cep); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('endereco') ? ' has-error' : ''); ?>">
                                <label for="endereco" class="col-md-2 control-label">Endereço</label>

                                <div class="col-md-8">
                                    <input id="endereco" type="text" class="form-control" name="endereco" value="<?php echo e($cliente->endereco); ?>" required autofocus>

                                    <?php if($errors->has('endereco')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($cliente->endereco); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('bairro') ? ' has-error' : ''); ?>">
                                <label for="bairro" class="col-md-2 control-label">Bairro</label>

                                <div class="col-md-8">
                                    <input id="bairro" type="text" class="form-control" name="bairro" value="<?php echo e($cliente->bairro); ?>" required autofocus>

                                    <?php if($errors->has('bairro')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($cliente->bairro); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('cidade_idCidade') ? ' has-error' : ''); ?>">
                                <label for="cidade_idCidade" class="col-md-2 control-label">Cidade</label>

                                <div class="col-md-8">
                                    <input id="cidade_idCidade" type="text" class="form-control" value="<?php echo e($cliente->cidade_idCidade); ?>" name="cidade_idCidade" required autofocus>

                                    <?php if($errors->has('cidade_idCidade')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($cliente->cidade_idCidade); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('estado_idEstado') ? ' has-error' : ''); ?>">
                                <label for="estado_idEstado" class="col-md-2 control-label">Estado</label>

                                <div class="col-md-8">
                                    <input id="estado_idEstado" type="text" class="form-control" value="<?php echo e($cliente->estado_idEstado); ?>" name="estado_idEstado" required autofocus>

                                    <?php if($errors->has('estado_idEstado')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($cliente->estado_idEstado); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('fone') ? ' has-error' : ''); ?>">
                                <label for="fone" class="col-md-2 control-label">Telefone</label>

                                <div class="col-md-8">
                                    <input id="fone" type="text" class="form-control"  value="<?php echo e($cliente->fone); ?>" name="fone" required autofocus>

                                    <?php if($errors->has('fone')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($cliente->fone); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('celular') ? ' has-error' : ''); ?>">
                                <label for="celular" class="col-md-2 control-label">Celular</label>

                                <div class="col-md-8">
                                    <input id="celular" type="text" class="form-control" value="<?php echo e($cliente->celular); ?>" name="celular" required autofocus>

                                    <?php if($errors->has('celular')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($cliente->celular); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <label for="email" class="col-md-2 control-label">E-mail</label>

                                <div class="col-md-8">
                                    <input id="email" type="text" class="form-control" value="<?php echo e($cliente->email); ?>" name="email" required autofocus>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.padrao', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>