@extends('layouts.padrao')
@section('content')
    <div id="page-wrapper" >
        <div class="header">
            <h1 class="page-header">Ordens de Compras</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li class="active">Lista de Ordens de Compras</li>
                <li><a href="{{ url('ocs/create') }} ">Adicionar Ordem de Compra</a></li>
            </ol>
        </div>
        <div class="col-md-12">
            <!--   Basic Table  -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de Ordem de Compra
                </div>
                <div class="panel-body">
                    {!!$grid->make()!!}
                </div>
                <div class="panel-body" align="left">
                    <a href="ocs/create">
                        <button type="button" class="btn btn-primary">Cadastrar Ordem Compra</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection