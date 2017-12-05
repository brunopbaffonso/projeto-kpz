<?php $__env->startSection('content'); ?>

<div id="page-wrapper">

            <div class="header"> 
                    <h1 class="page-header">Bem Vindo!</h1>
                    <ol class="breadcrumb">
                    <li class="active">Inicio</li>
                    </ol>                      
            </div>
        
        <div id="page-inner">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="well">
                        <h4>Serviços</h4>
                        <p>Nessa aplicação, você ira poder adicionar novos serviços, afim de ter um maior controle
                        sobre as vendas que ocorreram ou seram efetuadas.</p>
                    </div>
                </div>

                 <div class="col-md-4 col-sm-4">
                    <div class="well">
                        <h4>Insumos</h4>
                        <p>Melhore o controle do seu estoque, cadastrando, editando e excluindo se assim necessario
                        qualquer insumo que pertece ao seu estoque!</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="well">
                        <h4>Compra</h4>
                        <p>Está com algo em falta no seu estoque? Analise o que falta e vá as compras! Aqui, seu 
                        estoque e analizado e seu pedido de compra e feito automaticamente.</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="well">
                        <h4>Fornecedores</h4>
                        <p>Mantenha sua lista de fornecedores atualiza, e tenha seus insumos sempre a 
                        pronta entrega!</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="well">
                        <h4>Clientes</h4>
                        <p>Manter sua lista de clientes atualizada e sempre importante para os negocios.
                        Consulte, atualize e delete se for necessario.</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="well">
                        <h4>Relátorios</h4>
                        <p>Tenha todos os relatorios atualizados sobre todo o andamento da empresa!</p>
                    </div>
               </div>
		</div>
	</div>
</div> 
<?php $__env->stopSection(); ?>      
<?php echo $__env->make('layouts.padrao', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>