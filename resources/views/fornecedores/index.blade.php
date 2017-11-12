@extends('layouts.padrao')
@section('content')
    <div id="page-wrapper" >
    <div class="header"> 
        <h1 class="page-header">Fornecedores</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li class="active">Lista de Fornecedores</li>
                <li><a href="{{ url('fornecedores/create') }} ">Adicionar Fornecedor</a></li>
            </ol>               
    </div>
    {!!Form::open(['url' => 'fornecedores', 'method' => 'get', 'class' => 'form-inline text-center'])!!}
    <div id="page-inner"> 
        <div class="form-group">
            <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
            <input type="text" class="form-control" name="nome" placeholder="Ex: Nome/CNPJ">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    {!! Form::close() !!}
    <div class="col-md-12">
            <!--   Basic Table  -->
                 <div class="panel panel-default">
                    <div class="panel-heading">
                          Lista de Fornecedores
                    </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                            <tr>
                                <td>Código</td>
                                <td class="hidden">Ativo</td>
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
                                         <div role="group" class="btn-group">
                                            {!!Form::open(['url' => 'fornecedores/'.$fornecedor->idFornecedor, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse Fornecedor?");'])!!}
                                            <button class="btn btn-warning btn-xs" href="fornecedores/{{ $fornecedor->idFornecedor}}/edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                            {!! Form::close() !!}
                                        </div>
                                         <div role="group" class="btn-group">
                                            {!!Form::open(['url' => 'fornecedores/'.$fornecedor->idFornecedor, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse Fornecedor?");'])!!}
                                            <button type="submit" name="nada" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </table>
                            </div>
                        </div>
                    <div class="panel-body" align="left">
                    <a href="fornecedores/create">
                         <button type="button" class="btn btn-primary">Cadastrar Fornecedor</button>
                    </a>
                </div>
        </div>
</div>
@endsection