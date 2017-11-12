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
        {!!Form::open(['url' => 'subprodutos', 'method' => 'get', 'class' => 'form-inline text-center'])!!}
        <div id="page-inner">
            <div class="form-group">
                <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
                <input type="text" class="form-control" name="nome" placeholder="Ex: Tipo/Quantidade">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
            {!! Form::close() !!}
            <div class="col-md-12">
                <!--   Basic Table  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lista de Subprodutos
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr>
                                <td>Código</td>
                                <td>Tipo</td>
                                <td>Quantidade</td>
                                <td>Comprimento</td>
                                <td>Largura</td>
                                <td>Data de Criação</td>
                            </tr>
                            @foreach ($subproduto as $subproduto)
                                <tr>
                                    <td>{{ $subproduto->idSubproduto}}</td>
                                    <td>{{ $subproduto->tipo}}</td>
                                    <td>{{ $subproduto->quantidade}}</td>
                                    <td>{{ $subproduto->comprimento}}</td>
                                    <td>{{ $subproduto->largura}}</td>
                                    <td>{{ $subproduto->created_at}}</td>
                                    <td>
                                        <div role="group" class="btn-group">
                                            {!!Form::open(['url' => 'subprodutos/'.$subproduto->idSubproduto, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse Subproduto?");'])!!}
                                            <a class="btn btn-warning btn-xs" href="subprodutos/{{ $subproduto->idSubproduto }}/edit"><span class="glyphicon glyphicon-pencil"></span></a>
                                            {!! Form::close() !!}
                                        </div>
                                        <div role="group" class="btn-group">
                                            {!!Form::open(['url' => 'subprodutos/'.$subproduto->idSubproduto, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse Subproduto?");'])!!}
                                            <button type="submit" name="nada" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="panel-body" align="left">
                            <a href="subprodutos/create">
                                <button type="button" class="btn btn-primary">Cadastrar Subproduto</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection