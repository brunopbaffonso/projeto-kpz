<?php $__env->startSection('content'); ?>
<div id="page-wrapper" >
    <div class="header"> 
        <h1 class="page-header">Itens</h1>
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li class="active">Lista de Itens</li>
                <li><a href="<?php echo e(url('items/create')); ?>">Adicionar Item</a></li>
            </ol>               
    </div>
    <?php echo Form::open(['url' => 'items', 'method' => 'get', 'class' => 'form-inline text-center']); ?>

    <div class="form-group">
        <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
        <input type="text" class="form-control" name="nome" placeholder="Ex: Quantidade/Borda/Preço Unitario/Fonte">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
    <?php echo Form::close(); ?>

    <div class="col-md-12">
            <!--   Basic Table  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                          Lista de Itens
                    </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                <tr>
                                    <td>ID</td>
                                    <td>Quantidade</td>
                                    <td>Largura</td>
                                    <td>Comprimento</td>
                                    <td>Unidade de Medida</td>
                                    <td>Borda</td>
                                    <td>Arte</td>
                                    <td>Preço Unitario</td>
                                    <td>Fonte</td>
                                    <td>Data de Criação</td>
                                </tr>
                                <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->idItem); ?></td>
                                        <td><?php echo e($item->quantidade); ?></td>
                                        <td><?php echo e($item->largura); ?></td>
                                        <td><?php echo e($item->comprimento); ?></td>
                                        <td><?php echo e($item->unidadeMedida); ?></td>
                                        <td><?php echo e($item->borda); ?></td>
                                        <td><?php echo e($item->arte); ?></td>
                                        <td><?php echo e($item->precoUnit); ?></td>
                                        <td><?php echo e($item->fonte); ?></td>
                                        <td><?php echo e($item->created_at); ?></td>
                                        <td>
                                            <?php echo Form::open(['url' => 'items/'.$item->idItem, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse Item?");']); ?>

                                            <a class="btn btn-warning btn-xs" href="items/<?php echo e($item->idItem); ?>/edit"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <?php echo Form::close(); ?>

                                            <?php echo Form::open(['url' => 'items/'.$item->idItem, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse Item?");']); ?>

                                            <button type="submit" name="nada" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                                            <?php echo Form::close(); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                    </div>
                <div class="panel-body" align="left">
                    <a href="items/create">
                        <button type="button" class="btn btn-primary">Cadastrar item</button>
                     </a>
                </div>
        </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.padrao', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>