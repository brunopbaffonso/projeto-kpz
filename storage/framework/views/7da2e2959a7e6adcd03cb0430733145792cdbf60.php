<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KAPAZI CAPACHOS PERSONALIZADOS</title>
    <!-- Bootstrap Styles-->
     <?php echo Html::style('css/bootstrap.min.css'); ?>


   	 <?php echo Html::style('css/login.css'); ?>

     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
		<?php echo $__env->yieldContent('conteudo'); ?>
		<?php echo e(Html::script('js/jquery-1.10.2.js')); ?>

        <?php echo e(Html::script('js/bootstrap.min.js')); ?>

        <?php echo e(Html::script('js/dataTables/jquery.dataTables.js')); ?>

        <?php echo e(Html::script('js/jquery.metisMenu.js')); ?>

        <?php echo e(Html::script('js/dataTables/dataTables.bootstrap.js')); ?>

        <?php echo e(Html::script('js/custom-scripts.js')); ?>

</body>
</html>