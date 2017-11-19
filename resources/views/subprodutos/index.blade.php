@extends('layouts.padrao')
@section('content')
 <div id="page-wrapper" >
    <div class="header"> 
        <h1 class="page-header">Subprodutos</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li class="active">Lista de Subprodutos</li>
                <li><a href="{{ url('subprodutos/create') }} ">Adicionar Subproduto</a></li>
            </ol>               
    </div>
    <div class="col-md-12">
            <!--   Basic Table  -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Lista de SubProduto
            </div>
            <div class="panel-body">
                 {!!$grid->make()!!}
            </div>
            <div class="panel-body" align="left">
                <a href="subprodutos/create">
                    <button type="button" class="btn btn-primary">Cadastrar SubProduto</button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection