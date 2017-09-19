@extends('layouts.app')
@section('content')
    {!!Form::open(['url' => 'fornecedores', 'method' => 'get', 'class' => 'form-inline text-center'])!!}
    <h1>Fornecedores</h1>
    <div class="form-group">
        <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
        <input type="text" class="form-control" name="nome" placeholder="Ex: Nome/CNPJ">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
    {!! Form::close() !!}
    <div class="table-responsive container">
        <table class="table table-houver table-bordered">
            <tr>
                <td>ID</td>
                <td>Ativo</td>
                <td>Nome</td>
                <td>CNPJ</td>
                <td>IE</td>
                <td>Endereço</td>
                <td>Bairro</td>
                <td>CEP</td>
                <td>Fone</td>
                <td>Celular</td>
                <td>E-mail</td>
            </tr>
            @foreach ($fornecedor as $fornecedor)
                <tr>
                    <td>{{ $fornecedor->idFornecedor}}</td>
                    <td>{{ $fornecedor->ativo}}</td>
                    <td>{{ $fornecedor->nome}}</td>
                    <td>{{ $fornecedor->cnpj}}</td>
                    <td>{{ $fornecedor->ie}}</td>
                    <td>{{ $fornecedor->endereco}}</td>
                    <td>{{ $fornecedor->bairro}}</td>
                    <td>{{ $fornecedor->cep}}</td>
                    <td>{{ $fornecedor->fone}}</td>
                    <td>{{ $fornecedor->celular}}</td>
                    <td>{{ $fornecedor->email}}</td>
                    <td>
                        {!!Form::open(['url' => 'fornecedores/'.$fornecedor->idFornecedor, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse Fornecedor?");'])!!}
                        <a class="btn btn-warning btn-xs" href="$fornecedores/{{ $fornecedor->idFornecedor}}/edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        {!! Form::close() !!}
                        {!!Form::open(['url' => 'fornecedores/'.$fornecedor->idFornecedor, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse Fornecedor?");'])!!}
                        <button type="submit" name="nada" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection