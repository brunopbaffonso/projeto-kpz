@extends('layouts.app')
@section('content')
    {!!Form::open(['url' => 'subprodutos', 'method' => 'get', 'class' => 'form-inline text-center'])!!}
    <h1>Subprodutos</h1>
    <div class="form-group">
        <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
        <input type="text" class="form-control" name="nome" placeholder="Ex: Tipo/Quantidade">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
    {!! Form::close() !!}
    <div class="panel-body">
        <a href="subprodutos/create">
            <button type="button" class="btn btn-primary">Cadastrar Subproduto</button>
        </a>
    </div>
    <div class="table-responsive container">
        <table class="table table-houver table-bordered">
            <tr>
                <td>ID</td>
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
                        {!!Form::open(['url' => 'subprodutos/'.$subproduto->idSubproduto, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse Subproduto?");'])!!}
                        <a class="btn btn-warning btn-xs" href="subprodutos/{{ $subproduto->idSubproduto }}/edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        {!! Form::close() !!}
                        {!!Form::open(['url' => 'subprodutos/'.$subproduto->idSubproduto, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse Subproduto?");'])!!}
                        <button type="submit" name="nada" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection