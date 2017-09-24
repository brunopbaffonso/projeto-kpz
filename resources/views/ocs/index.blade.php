@extends('layouts.app')
@section('content')
    {!!Form::open(['url' => 'ocs', 'method' => 'get', 'class' => 'form-inline text-center'])!!}
    <h1>OCs</h1>
    <div class="form-group">
        <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
        <input type="text" class="form-control" name="nome" placeholder="Ex: Tipo/Observacoes">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
    {!! Form::close() !!}
    <div class="panel-body">
        <a href="ocs/create">
            <button type="button" class="btn btn-primary">Cadastrar OC</button>
        </a>
    </div>
    <div class="table-responsive container">
        <table class="table table-houver table-bordered">
            <tr>
                <td>ID</td>
                <td>Tipo</td>
                <td>Observações</td>
                <td>Data de Criação</td>
            </tr>
            @foreach ($oc as $oc)
                <tr>
                    <td>{{ $oc->idOC}}</td>
                    <td>{{ $oc->tipo}}</td>
                    <td>{{ $oc->observacoes}}</td>
                    <td>{{ $oc->created_at}}</td>
                    <td>
                        {!!Form::open(['url' => 'ocs/'.$oc->idOC, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse OC?");'])!!}
                        <a class="btn btn-warning btn-xs" href="ocs/{{ $oc->idOC }}/edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        {!! Form::close() !!}
                        {!!Form::open(['url' => 'ocs/'.$oc->idOC, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse OC?");'])!!}
                        <button type="submit" name="nada" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection