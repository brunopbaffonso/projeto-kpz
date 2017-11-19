@extends('layouts.padrao')
@section('content')
<div id="page-wrapper" >
    <div class="header"> 
        <h1 class="page-header">Ordem de Serviço</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li class="active">Lista de Serviços</li>
                <li><a href="{{ url('oss/create') }}">Adicionar Serviço</a></li>
            </ol>               
    </div>
        <div class="col-md-12">
            <!--   Basic Table  -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Lista de Ordem de Serviço
            </div>
            <div class="panel-body">
                 {!!$grid->make()!!}
            </div>
            <div class="panel-body" align="left">
                <a href="oss/create">
                    <button type="button" class="btn btn-primary">Cadastrar Os</button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection