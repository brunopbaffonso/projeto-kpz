@extends('layouts.padrao')
@section('content')
    <div id="page-wrapper" >
        <div class="header">
            <h1 class="page-header">Insumos</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li class="active">Lista de Insumos</li>
                <li><a href="{{ url('insumos/create') }}">Adicionar Insumo</a></li>
            </ol>
        </div>
        {!!Form::open(['url' => 'insumos', 'method' => 'get', 'class' => 'form-inline text-center'])!!}
        <div id="page-inner">
            <div class="form-group">
                <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
                <input type="text" class="form-control" name="nome" placeholder="Ex: Quantidade/Preço Unitário/Unid. Medida">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
            {!! Form::close() !!}
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
                                    <td>Código</td>
                                    <td>Quantidade</td>
                                    <td>Comprimento</td>
                                    <td>Largura</td>
                                    <td>Medida</td>
                                    <td>Unitário</td>
                                    <td>Data de Criação</td>
                                </tr>
                                @foreach ($insumo as $insumo)
                                    <tr>
                                        <td>{{ $insumo->idInsumo}}</td>
                                        <td>{{ $insumo->quantidade}}</td>
                                        <td>{{ $insumo->comprimento}}</td>
                                        <td>{{ $insumo->largura}}</td>
                                        <td>{{ $insumo->unidadeMedida}}</td>
                                        <td>{{ $insumo->precoUnit}}</td>
                                        <td>{{ $insumo->created_at}}</td>
                                        <td>
                                            <div role="group" class="btn-group">
                                                {!!Form::open(['url' => 'insumos/'.$insumo->idInsumo, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse Insumo?");'])!!}
                                                <button class="btn btn-warning btn-xs" href="insumos/{{ $insumo->idInsumo}}/edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                                {!! Form::close() !!}
                                            </div>
                                            <div role="group" class="btn-group">
                                                {!!Form::open(['url' => 'insumos/'.$insumo->idInsumo, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse Insumo?");'])!!}
                                                <button type="submit" name="nada" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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
@endsection