@extends('layouts.padrao')
@section('content')
    <div id="page-wrapper" >
        <div class="header">
            <h1 class="page-header">Usuários</h1>
            <ol class="breadcrumb">
                <li><a>Inicio</a></li>
                <li class="active" href="{{ url('usuarios/') }}">Lista de Usuários</li>
                <li><a href="{{ url('usuarios/create') }}">Adicionar Usuário</a></li>
            </ol>
        </div>

        <div class="col-md-12">
            <!--   Basic Table  -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    {!!Form::open(['url' => 'usuarios', 'method' => 'get', 'class' => 'form-inline text-center'])!!}
                    <div class="form-group">
                        <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
                        <input type="text" class="form-control" name="nome" placeholder="Ex: Nome/CPF/E-mail">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                    {!! Form::close() !!}


                    Lista de Usuários
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-houver table-bordered">
                            <tr>
                                <td>CPF</td>
                                <td class="hidden">Ativo</td>
                                <td class="hidden">Tipo de Acesso</td>
                                <td>Nome</td>
                                <td>Telefone</td>
                                <td>Celular</td>
                                <td>E-mail</td>
                                <td>Data de Criação</td>
                            </tr>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{ $newcpf = (strlen($usuario->cpf) == 11) ? ($usuario->cpf) : ( "0".$usuario->cpf) }}</td>
                                    <td class="hidden">{{ ($usuario->ativo) ? 'Sim' : 'Não' }}</td>
                                    <td class="hidden">{{ $usuario->tipoAcesso }}</td>
                                    <td>{{ $usuario->nome }}</td>
                                    <td>{{ $usuario->fone }}</td>
                                    <td>{{ $usuario->celular }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ date('d/m/Y H:i', strtotime($usuario->created_at)) }}</td>
                                    <td>
                                        <div role="group" class="btn-group">
                                            {!!Form::open(['url' => 'usuarios/'.$newcpf, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse Usuário?");'])!!}
                                            <button class="btn btn-warning btn-xs" href="usuarios/{{(strlen($usuario->cpf) == 11) ? ($usuario->cpf) : ( "0".$usuario->cpf) }}/edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                            {!! Form::close() !!}
                                        </div>
                                        <div role="group" class="btn-group">
                                            {!!Form::open(['url' => 'usuarios/'.$newcpf, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse Usuário?");'])!!}
                                            <a type="submit" name="nada" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="panel-body" align="left">
                    <a href="usuarios/create">
                        <button type="button" class="btn btn-primary">Cadastrar Usuário</button>
                    </a>
                </div>
            </div>
        </div>

@endsection