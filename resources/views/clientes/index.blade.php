@extends('layouts.padrao')
@section('content')
<div id="page-wrapper" >
    <div class="header"> 
        <h1 class="page-header">Clientes</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li class="active">Lista de Clientes</li>
                <li><a href="{{ url('clientes/create') }}">Adicionar Cliente</a></li>
            </ol>               
    </div>
    {!!Form::open(['url' => 'clientes', 'method' => 'get', 'class' => 'form-inline text-center'])!!}
     <div id="page-inner"> 
        <div class="form-group">
            <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
            <input type="text" class="form-control" name="nome" placeholder="Ex: Nome/CPF/CNPJ">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    {!! Form::close() !!}   
        <div class="col-md-12">
            <!--   Basic Table  -->
                 <div class="panel panel-default">
                    <div class="panel-heading">
                          Lista de Clientes
                    </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Código</td>
                                        <td class="hidden">Ativo</td>
                                        <td>Nome</td>
                                        <td>CPF</td>
                                        <td>CNPJ</td>
                                        <td>IE</td>
                                        <td>Endereço</td>
                                        <td>Bairro</td>
                                        <td>CEP</td>
                                        <td>Fone</td>
                                        <td>Celular</td>
                                        <td>E-mail</td>
                                        <td>Cidade</td>
                                    </tr>
                                    @foreach ($cliente as $cliente)
                                        <tr>
                                            <td>{{ $cliente->idCliente}}</td>
                                            <td class="hidden">{{ $cliente->ativo}}</td>
                                            <td>{{ $cliente->nome}}</td>
                                            <td>{{ $cliente->cpf}}</td>
                                            <td>{{ $cliente->cnpj}}</td>
                                            <td>{{ $cliente->ie}}</td>
                                            <td>{{ $cliente->endereco}}</td>
                                            <td>{{ $cliente->bairro}}</td>
                                            <td>{{ $cliente->cep}}</td>
                                            <td>{{ $cliente->fone}}</td>
                                            <td>{{ $cliente->celular}}</td>
                                            <td>{{ $cliente->email}}</td>
                                            <td>{{ $cliente->cidade_idCidade}}</td>
                                            <td>
                                                <div role="group" class="btn-group">
                                                    {!!Form::open(['url' => 'clientes/'.$cliente->idCliente, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse Cliente?");'])!!}
                                                    <button  class="btn btn-warning btn-xs" href="clientes/{{ $cliente->idCliente}}/edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                                    {!! Form::close() !!}
                                                </div>
                                                <div role="group" class="btn-group">
                                                    {!!Form::open(['url' => 'clientes/'.$cliente->idCliente, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse Cliente?");'])!!}
                                                    <button class="btn btn-xs btn-danger type="submit" name=""><span class="glyphicon glyphicon-trash"></span></button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </td>
                                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="panel-body" align="left">
                <a href="clientes/create">
                    <button type="button" class="btn btn-primary">Cadastrar Cliente</button>
                 </a>
            </div>
        </div>
    </div>
</div>
@endsection