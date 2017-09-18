@extends('master.app')
@section('content')
    {!!Form::open(['url' => 'clientes', 'method' => 'get', 'class' => 'form-inline text-center'])!!}
    <h1>Clientes</h1>
    <div class="form-group">
        <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
        <input type="text" class="form-control" name="nome" placeholder="Ex: Nome/CNPJ/CPF">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
    {!! Form::close() !!}
    <div class="table-responsive container">
        <table class="table table-houver table-bordered">
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>CNPJ</td>
                <td>CPF</td>
                <td>IE</td>
                <td>Endereço</td>
                <td>Bairro</td>
                <td>CEP</td>
                <td>Fone</td>
                <td>Celular</td>
                <td>E-mail</td>
                <td>Data de Criação</td>
            </tr>
            @foreach ($cliente as $cliente)
                <tr>
                    <td>{{ $cliente->idFornecedor}}</td>
                    <td>{{ $cliente->nome}}</td>
                    <td>{{ $cliente->cnpj}}</td>
                    <td>{{ $cliente->cpf}}</td>
                    <td>{{ $cliente->ie}}</td>
                    <td>{{ $cliente->endereco}}</td>
                    <td>{{ $cliente->bairro}}</td>
                    <td>{{ $cliente->cep}}</td>
                    <td>{{ $cliente->fone}}</td>
                    <td>{{ $cliente->celular}}</td>
                    <td>{{ $cliente->email}}</td>
                    <td>{{ $cliente->created_at}}</td>
                    <td>
                        {!!Form::open(['url' => 'clientes/'.$cliente->idCliente, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse Cliente?");'])!!}
                        <a class="btn btn-warning btn-xs" href="clientes/{{ $cliente->idCliente}}/edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        {!! Form::close() !!}
                        {!!Form::open(['url' => 'clientes/'.$cliente->idCliente, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse Cliente?");'])!!}
                        <button type="submit" name="nada" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection