@extends('layouts.app')
@section('content')
    {!!Form::open(['url' => 'modelos', 'method' => 'get', 'class' => 'form-inline text-center'])!!}
    <h1>Modelos</h1>
    <div class="form-group">
        <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
        <input type="text" class="form-control" name="nome" placeholder="Ex: Nome">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
    {!! Form::close() !!}
    <div class="table-responsive container">
        <table class="table table-houver table-bordered">
            <tr>
                <td>ID</td>
                <td>Nome</td>
            </tr>
            @foreach ($modelo as $modelo)
                <tr>
                    <td>{{ $modelo->idModelo}}</td>
                    <td>{{ $modelo->nome}}</td>
                    <td>
                        {!!Form::open(['url' => 'modelos/'.$modelo->idModelo, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse Modelo?");'])!!}
                        <a class="btn btn-warning btn-xs" href="modelos/{{ $modelo->idModelo}}/edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        {!! Form::close() !!}
                        {!!Form::open(['url' => '$modelos/'.$modelo->idModelo, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse Modelo?");'])!!}
                        <button type="submit" name="nada" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection