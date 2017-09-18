@extends('master.app')
@section('content')
    {!!Form::open(['url' => 'clientes', 'method' => 'get', 'class' => 'form-inline text-center'])!!}
    <div id="page-wrapper" >
            <div class="header"> 

                        <h1 class="page-header">Clientes</h1>
                        <ol class="breadcrumb">
                          <li><a href="#">Inicio</a></li>
                          <li><a href="#">Clientes</a></li>
                          <li class="active">Lista de Clientes</li>
                        </ol>               
            </div>
        
            <div id="page-inner"> 
               
            <div class="col-md-12">
                     <!--   Basic Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Lista de Produtos
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
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
    </div>
<!-- End  Basic Table  -->
    </div>
</div>
                <!-- /. ROW  -->           
</div>
@endsection