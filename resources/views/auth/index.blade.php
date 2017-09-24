@extends('layouts.app')
@section('content')
    {!!Form::open(['url' => 'usuarios', 'method' => 'get', 'class' => 'form-inline text-center'])!!}
    <h1>Usuários</h1>
    <div class="form-group">
        <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
        <input type="text" class="form-control" name="nome" placeholder="Ex: Nome/CPF/E-mail">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
    {!! Form::close() !!}
    {!! Form::open(['url' => 'usuarios/create']) !!}
    <div class="panel-body">
        <button type="button" class="btn btn-primary">Cadastrar Usuário</button>
    </div>
    {!! Form::close() !!}
    <div class="table-responsive container">
        <table class="table table-houver table-bordered">
            <tr>
                <td>CPF</td>
                <td>Tipo de Acesso</td>
                <td>Nome</td>
                <td>Telefone</td>
                <td>Celular</td>
                <td>E-mail</td>
                <td>Data de Criação</td>
            </tr>
            @foreach ($usuario as $usuario)
                <tr>
                    <td>{{ $usuario->cpf}}</td>
                    <td>{{ $usuario->tipoAcesso}}</td>
                    <td>{{ $usuario->nome}}</td>
                    <td>{{ $usuario->fone}}</td>
                    <td>{{ $usuario->celular}}</td>
                    <td>{{ $usuario->email}}</td>
                    <td>{{ $usuario->created_at}}</td>
                    <td>
                        {!!Form::open(['url' => 'usuarios/'.$usuario->cpf, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse Usuário?");'])!!}
                        <a class="btn btn-warning btn-xs" href="usuarios/{{ $usuario->cpf}}/edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        {!! Form::close() !!}
                        {!!Form::open(['url' => 'usuarios/'.$usuario->cpf, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse Usuário?");'])!!}
                        <button type="submit" name="nada" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection