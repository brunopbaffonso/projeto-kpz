@extends('layouts.app')
@section('content')
    {!!Form::open(['url' => 'clientes', 'method' => 'get', 'class' => 'form-inline text-center'])!!}
    <h1>Clientes</h1>
    <div class="form-group">
        <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
        <input type="text" class="form-control" name="nome" placeholder="Ex: Nome / CNPJ / CPF">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
    {!! Form::close() !!}
    <div class="table-responsive container">
        <table class="table table-houver table-bordered">
            <tr>
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
            </tr>
            @foreach ($cliente as $cliente)
                <tr>
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
                    <td>
                        {!!Form::open(['url' => 'clientes/'.$cliente->id, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse Cliente?");'])!!}
                        <a class="btn btn-warning btn-xs" href="clientes{{ $cliente->id}}/edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        <button type="submit" name="nada" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection