@extends('layouts.app')
@section('content')
    {!!Form::open(['url' => 'insumos', 'method' => 'get', 'class' => 'form-inline text-center'])!!}
    <h1>Insumos</h1>
    <div class="form-group">
        <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
        <input type="text" class="form-control" name="nome" placeholder="Ex: Quantidade/Preço Unitário/Unid. Medida">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
    {!! Form::close() !!}
    <div class="table-responsive container">
        <table class="table table-houver table-bordered">
            <tr>
                <td>ID</td>
                <td>Quantidade</td>
                <td>Comprimento</td>
                <td>Largura</td>
                <td>Unidade de Medida</td>
                <td>Preço Unitário</td>
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
                        {!!Form::open(['url' => 'insumos/'.$insumo->idInsumo, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse Insumo?");'])!!}
                        <a class="btn btn-warning btn-xs" href="insumos/{{ $insumo->idInsumo}}/edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        {!! Form::close() !!}
                        {!!Form::open(['url' => 'insumos/'.$insumo->idInsumo, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse Insumo?");'])!!}
                        <button type="submit" name="nada" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection