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


                                <div class="form-group<?php echo e($errors->has('precoTotal') ? ' has-error' : ''); ?>">
                                    <label for="precoTotal" class="col-md-2 control-label">Preço Total:</label>

                                    <div class="col-md-8">
                                        <input id="precoTotal" type="number" class="form-control" name="precoTotal" value="<?php echo e(old('precoTotal')); ?>" data-toggle="tooltip" data-placement="top" title="Tooltip on top" required autofocus>

                                        <?php if($errors->has('precoTotal')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('precoTotal')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('desconto') ? ' has-error' : ''); ?>">
                                    <label for="desconto" class="col-md-2 control-label">Desconto:</label>

                                    <div class="col-md-8">
                                        <input id="desconto" type="number" class="form-control" name="desconto" value="<?php echo e(old('desconto')); ?>" data-toggle="tooltip" data-placement="top" title="Tooltip on top" autofocus>

                                        <?php if($errors->has('desconto')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('desconto')); ?></strong>
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

                                        <button type="button" id="novoItem" class="btn btn-primary">
                                            Novo Item
                                        </button>
                                    </div>
                                </div>
                                <?php echo Form::close(); ?>


                            <div id="item">
                                <li>text</li>
                            </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('js'); ?>
        <script>
            $('#novoItem').on('click', function() {

                var para = document.createElement("p");
                var node = document.createTextNode("Novo Item");
                para.appendChild(node);

                var element = document.getElementById("item");
                element.appendChild(para);
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.padrao', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>