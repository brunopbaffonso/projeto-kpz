<?php $__env->startSection('content'); ?>
 <div id="page-wrapper" >
    <div class="header"> 
        <h1 class="page-header">Subprodutos</h1>
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li class="active">Lista de Subprodutos</li>
                <li><a href="<?php echo e(url('subprodutos/create')); ?> ">Adicionar Subproduto</a></li>
            </ol>               
    </div>
    <?php echo Form::open(['url' => 'subprodutos', 'method' => 'get', 'class' => 'form-inline text-center']); ?>

    <div id="page-inner">  
    <div class="form-group">
        <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
        <input type="text" class="form-control" name="nome" placeholder="Ex: Tipo/Quantidade">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
    <?php echo Form::close(); ?>

    <div class="col-md-12">
        <!--   Basic Table  -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de Subprodutos
                </div>
                <div class="panel-body">   
                <table class="table table-bordered">
            <tr>
                <td>ID</td>
                <td>Tipo</td>
                <td>Quantidade</td>
                <td>Comprimento</td>
                <td>Largura</td>
                <td>Data de Criação</td>
            </tr>
            <?php $__currentLoopData = $subproduto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subproduto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($subproduto->idSubproduto); ?></td>
                    <td><?php echo e($subproduto->tipo); ?></td>
                    <td><?php echo e($subproduto->quantidade); ?></td>
                    <td><?php echo e($subproduto->comprimento); ?></td>
                    <td><?php echo e($subproduto->largura); ?></td>
                    <td><?php echo e($subproduto->created_at); ?></td>
                    <td>
                         <div role="group" class="btn-group">
                            <?php echo Form::open(['url' => 'subprodutos/'.$subproduto->idSubproduto, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse Subproduto?");']); ?>

                            <a class="btn btn-warning btn-xs" href="subprodutos/<?php echo e($subproduto->idSubproduto); ?>/edit"><span class="glyphicon glyphicon-pencil"></span></a>
                            <?php echo Form::close(); ?>

                        </div>
                        <div role="group" class="btn-group">
                            <?php echo Form::open(['url' => 'subprodutos/'.$subproduto->idSubproduto, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse Subproduto?");']); ?>

                            <button type="submit" name="nada" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                            <?php echo Form::close(); ?>

                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.padrao', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>