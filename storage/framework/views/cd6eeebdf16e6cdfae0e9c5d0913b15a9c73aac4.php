<?php $__env->startSection('content'); ?>
    <div id="page-wrapper">

        <div class="header">
            <h1 class="page-header">Adicionar Fornecedor</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/')); ?>">Inicio</a></li>
                <li><a href="<?php echo e(url('fornecedores')); ?>">Listar Fornecedores</a></li>
                <li class="active">Adicionar Fornecedor</li>
            </ol>
        </div>

        <div id="page-inner">

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="card-title">
                                <div class="title">Novo Fornecedor</div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-horizontal">
                                <?php echo Form::open(['url' => 'fornecedores/', 'method' => 'post']); ?>


                                <div class="form-group<?php echo e($errors->has('nome') ? ' has-error' : ''); ?>">
                                    <label for="nome" class="col-md-2 control-label">*Nome:</label>

                                    <div class="col-md-8">
                                        <input id="nome" type="text" class="form-control" name="nome" value="<?php echo e(old('nome')); ?>" placeholder="Kapazi LTDA" maxlength="255" pattern="[a-zA-Z\s]+$" data-toggle="tooltip" data-placement="top" title="Esse campo aceita somente caracteres minúsculo/MAIÚSCULOS" required autofocus>

                                        <?php if($errors->has('nome')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('nome')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('cnpj') ? ' has-error' : ''); ?>">
                                    <label for="cnpj" class="col-md-2 control-label">*CNPJ:</label>

                                    <div class="col-md-8">
                                        <input id="cnpj" type="text" class="form-control" name="cnpj" value="<?php echo e(old('cnpj')); ?>" pattern="[0-9]+$"  maxlength="14" placeholder="00000000000000" data-toggle="tooltip" data-placement="top" title="Esse campo só aceita números de 0 a 9" required autofocus>

                                        <?php if($errors->has('cnpj')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('cnpj')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('ie') ? ' has-error' : ''); ?>">
                                    <label for="ie" class="col-md-2 control-label">IE:</label>

                                    <div class="col-md-8">
                                        <input id="ie" type="text" class="form-control" name="ie" value="<?php echo e(old('ie')); ?>" attern="[0-9]+$"  maxlength="10" placeholder="0000000000" data-toggle="tooltip" data-placement="top" title="Esse campo só aceita números de 0 a 9" autofocus>

                                        <?php if($errors->has('ie')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('ie')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                 <div class="form-group<?php echo e($errors->has('cep') ? ' has-error' : ''); ?>">
                                    <label for="cep" class="col-md-2 control-label">CEP:</label>

                                    <div class="col-md-8">
                                        <input id="cep" type="text" class="form-control" name="cep" value="<?php echo e(old('cep')); ?>" placeholder="00000-000" maxlength="10" pattern="[0-9]+$" data-toggle="tooltip" data-placement="top" title="Esse campo só aceita números de 0 a 9" autofocus>

                                        <?php if($errors->has('cep')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('cep')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('endereco') ? ' has-error' : ''); ?>">
                                    <label for="endereco" class="col-md-2 control-label">*Endereço:</label>

                                    <div class="col-md-8">
                                        <input id="endereco" type="text" class="form-control" name="endereco" value="<?php echo e(old('endereco')); ?>" placeholder="Rua Aloisio de Azevedo" data-toggle="tooltip" data-placement="top" title="Esse campo aceita somente caracteres minúsculo/MAIÚSCULOS" required autofocus>

                                        <?php if($errors->has('endereco')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('endereco')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('bairro') ? ' has-error' : ''); ?>">
                                    <label for="bairro" class="col-md-2 control-label">*Bairro:</label>

                                    <div class="col-md-8">
                                        <input id="bairro" type="text" class="form-control" name="bairro" value="<?php echo e(old('bairro')); ?>" placeholder="Olarias" data-toggle="tooltip" data-placement="top" title="Esse campo aceita somente caracteres minúsculo/MAIÚSCULOS" required autofocus>

                                        <?php if($errors->has('bairro')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('bairro')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('cidade_idCidade') ? ' has-error' : ''); ?>">
                                    <label for="cidade_idCidade" class="col-md-2 control-label">*Cidade</label>

                                    <div class="col-md-8">
                                        <input id="cidade_idCidade" type="text" class="form-control" name="cidade_idCidade" value="<?php echo e(old('cidade_idCidade')); ?>" placeholder="Ex: Ponta Grossa" data-toggle="tooltip" data-placement="top" title="Esse campo aceita somente caracteres minúsculo/MAIÚSCULOS" required autofocus>

                                        <?php if($errors->has('cidade_idCidade')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('cidade_idCidade')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('estado_uf') ? ' has-error' : ''); ?>">
                                    <label for="estado_uf" class="col-md-2 control-label">Estado</label>

                                    <div class="col-md-8">
                                        <input id="estado_uf" type="text" class="form-control" name="estado_uf" value="<?php echo e(old('estado_uf')); ?>" placeholder="PR" data-toggle="tooltip" data-placement="top" title="Esse campo aceita somente caracteres MAIÚSCULOS" required autofocus>

                                        <?php if($errors->has('estado_uf')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('estado_uf')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('fone') ? ' has-error' : ''); ?>">
                                    <label for="fone" class="col-md-2 control-label">Telefone</label>

                                    <div class="col-md-8">
                                        <input id="fone" type="text" class="form-control" name="fone" value="<?php echo e(old('fone')); ?>" placeholder="(00)00000000" maxlength="12" pattern="[0-9]+$" data-toggle="tooltip" data-placement="top" title="Esse campo só aceita números de 0 a 9" autofocus>

                                        <?php if($errors->has('fone')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('fone')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('celular') ? ' has-error' : ''); ?>">
                                    <label for="celular" class="col-md-2 control-label">*Celular:</label>

                                    <div class="col-md-8">
                                        <input id="celular" type="text" class="form-control" name="celular" value="<?php echo e(old('celular')); ?>" placeholder="(00)900000000"  maxlength="13" pattern="[0-9]+$" data-toggle="tooltip" data-placement="top" title="Esse campo só aceita números de 0 a 9" required autofocus>

                                        
                                        
                                        
                                        
                                        
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                    <label for="email" class="col-md-2 control-label">*E-Mail:</label>

                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="abcde@gmail.com.br" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" data-toggle="tooltip" data-placement="top" title="Esse campo aceita somente caracteres minúsculo/MAIÚSCULOS e caracteres especiais. Obrigatório o uso de @!" required autofocus>

                                        <?php if($errors->has('email')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
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
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.padrao', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>