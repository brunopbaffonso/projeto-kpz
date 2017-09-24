@extends('layouts.app')
@section('content')
    {!!Form::open(['url' => 'items', 'method' => 'get', 'class' => 'form-inline text-center'])!!}
    <h1>Itens</h1>
    <div class="form-group">
        <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
        <input type="text" class="form-control" name="nome" placeholder="Ex: Quantidade/Borda/Preço Unitario/Fonte">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
    {!! Form::close() !!}
    <div class="panel-body">
        <a href="items/create">
            <button type="button" class="btn btn-primary">Cadastrar Item</button>
        </a>
    </div>
    <div class="table-responsive container">
        <table class="table table-houver table-bordered">
            <tr>
                <td>ID</td>
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
                        {!!Form::open(['url' => 'items/'.$item->idItem, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse Item?");'])!!}
                        <a class="btn btn-warning btn-xs" href="items/{{ $item->idItem }}/edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        {!! Form::close() !!}
                        {!!Form::open(['url' => 'items/'.$item->idItem, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse Item?");'])!!}
                        <button type="submit" name="nada" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection