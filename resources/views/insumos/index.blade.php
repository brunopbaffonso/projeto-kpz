@extends('layouts.padrao')
@section('content')
    <div id="page-wrapper" >
        <div class="header">
            <h1 class="page-header">Insumos</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li class="active">Listar Insumos</li>
                <li><a href="{{ url('insumos/create') }}">Adicionar Insumo</a></li>
            </ol>
        </div>
        <div class="col-md-12">
            <!--   Basic Table  -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de Insumos
                </div>
                <div class="panel-body">
                    {!!$grid->make()!!}
                </div>
                <div class="panel-body" align="left">
                    <a href="insumos/create">
                        <button type="button" class="btn btn-primary">Cadastrar Insumo</button>
                    </a>
                </div>
            </div>
        </div>
@endsection