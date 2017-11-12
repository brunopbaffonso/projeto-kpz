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
        {!!Form::open(['url' => 'items', 'method' => 'get', 'class' => 'form-inline text-center'])!!}
        <div id="page-inner">
            <div class="form-group">
                <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
                <input type="text" class="form-control" name="nome" placeholder="Ex: Quantidade/Borda/Preço Unitario/Fonte">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
            {!! Form::close() !!}
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
                                    <td>Código</td>
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
                                @foreach ($item as $item)
                                    <tr>
                                        <td>{{ $item->idItem }}</td>
                                        <td>{{ $item->quantidade }}</td>
                                        <td>{{ $item->largura }}</td>
                                        <td>{{ $item->comprimento }}</td>
                                        <td>{{ $item->unidadeMedida }}</td>
                                        <td>{{ $item->borda }}</td>
                                        <td>{{ $item->arte }}</td>
                                        <td>{{ $item->precoUnit }}</td>
                                        <td>{{ $item->fonte }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <div role="group" class="btn-group">
                                                {!!Form::open(['url' => 'items/'.$item->idItem, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse Item?");'])!!}
                                                <button class="btn btn-warning btn-xs" href="items/{{ $item->idItem }}/edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                                {!! Form::close() !!}
                                            </div>
                                            <div role="group" class="btn-group">
                                                {!!Form::open(['url' => 'items/'.$item->idItem, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse Item?");'])!!}
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
                        <a href="items/create">
                            <button type="button" class="btn btn-primary">Cadastrar item</button>
                        </a>
                    </div>
                </div>
            </div>
@endsection