@extends('layouts.padrao')
@section('content')
    <div id="page-wrapper" >
        <div class="header">
            <h1 class="page-header">Itens</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li class="active">Lista de Itens</li>
                <li><a href="{{ url('items/create') }}">Adicionar Item</a></li>
            </ol>
        </div>
        <div class="col-md-12">
            <!--   Basic Table  -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de Itens
                </div>
                <div class="panel-body">
                    {!!$grid->make()!!}
                </div>
            </div>
        </div>
@endsection