<?php $__env->startSection('content'); ?>
    <div id="page-wrapper" >
    <div class="header"> 
        <h1 class="page-header">Insumos</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/')); ?>">Inicio</a></li>
                <li class="active">Lista de Insumos</li>
                <li><a href="<?php echo e(url('insumos/create')); ?>">Adicionar Insumo</a></li>
            </ol>               
    </div>
    <?php echo Form::open(['url' => 'insumos', 'method' => 'get', 'class' => 'form-inline text-center']); ?>

    <div id="page-inner">     
        <div class="form-group">
            <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
            <input type="text" class="form-control" name="nome" placeholder="Ex: Quantidade/Preço Unitário/Unid. Medida">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    <?php echo Form::close(); ?>

    <div class="col-md-12">
            <!--   Basic Table  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                          Lista de Insumos
                    </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>ID</td>
                                        <td>Quantidade</td>
                                        <td>Comprimento</td>
                                        <td>Largura</td>
                                        <td>Medida</td>
                                        <td>Unitário</td>
                                        <td>Data de Criação</td>
                                    </tr>
                                    <?php $__currentLoopData = $insumo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insumo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($insumo->idInsumo); ?></td>
                                            <td><?php echo e($insumo->quantidade); ?></td>
                                            <td><?php echo e($insumo->comprimento); ?></td>
                                            <td><?php echo e($insumo->largura); ?></td>
                                            <td><?php echo e($insumo->unidadeMedida); ?></td>
                                            <td><?php echo e($insumo->precoUnit); ?></td>
                                            <td><?php echo e($insumo->created_at); ?></td>
                                            <td>
                                                 <div role="group" class="btn-group">
                                                    <?php echo Form::open(['url' => 'insumos/'.$insumo->idInsumo, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse Insumo?");']); ?>

                                                    <button class="btn btn-warning btn-xs" href="insumos/<?php echo e($insumo->idInsumo); ?>/edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                                    <?php echo Form::close(); ?>

                                                </div>
                                                 <div role="group" class="btn-group">
                                                    <?php echo Form::open(['url' => 'insumos/'.$insumo->idInsumo, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse Insumo?");']); ?>

                                                    <button type="submit" name="nada" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                                                    <?php echo Form::close(); ?>

                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>
                <div class="panel-body" align="left">
                    <a href="insumos/create">
                        <button type="button" class="btn btn-primary">Cadastrar Insumo</button>
                    </a>
                </div>
        </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.padrao', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>