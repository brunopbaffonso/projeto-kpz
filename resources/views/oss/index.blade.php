@extends('layouts.app')
@section('content')
    {!!Form::open(['url' => 'oss', 'method' => 'get', 'class' => 'form-inline text-center'])!!}
    <h1>OSs</h1>
    <div class="form-group">
        <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
        <input type="text" class="form-control" name="nome" placeholder="Ex: Preço Total/Forma Pgto/Observações">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
    {!! Form::close() !!}
    <div class="table-responsive container">
        <table class="table table-houver table-bordered">
            <tr>
                <td>ID</td>
                <td>Preço Total</td>
                <td>Desconto</td>
                <td>Forma Pgto</td>
                <td>Observações</td>
                <td>Data de Criação</td>
            </tr>
            @foreach ($os as $os)
                <tr>
                    <td>{{ $os->idOS}}</td>
                    <td>{{ $os->precoTotal}}</td>
                    <td>{{ $os->desconto}}</td>
                    <td>{{ $os->formaPgto}}</td>
                    <td>{{ $os->observacoes}}</td>
                    <td>{{ $os->created_at}}</td>
                    <td>
                        {!!Form::open(['url' => 'oss/'.$os->idOS, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse OS?");'])!!}
                        <a class="btn btn-warning btn-xs" href="oss/{{ $os->idOS}}/edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        {!! Form::close() !!}
                        {!!Form::open(['url' => 'oss/'.$os->idOS, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse OS?");'])!!}
                        <button type="submit" name="nada" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection