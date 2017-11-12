@extends('layouts.padrao')
@section('content')
    <div id="page-wrapper" >
        <div class="header">
            <h1 class="page-header">Ordem de Serviço</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li class="active">Lista de Serviços</li>
                <li><a href="{{ url('oss/create') }}">Adicionar Serviço</a></li>
            </ol>
        </div>
        {!!Form::open(['url' => 'oss', 'method' => 'get', 'class' => 'form-inline text-center'])!!}
        <div id="page-inner">
            <div class="form-group">
                <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
                <input type="text" class="form-control" name="nome" placeholder="Ex: Preço Total/Forma Pgto/Observações">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
            {!! Form::close() !!}
            <div class="col-md-12">
                <!--   Basic Table  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lista de Ordem Serviços
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Código</td>
                                    <td>Preço Total</td>
                                    <td>Desconto</td>
                                    <td>Forma Pgto</td>
                                    <td>Observações</td>
                                    <td>Data de Criação</td>
                                    <td class="col-md-2 "></td>
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
                                            <div role="group" class="btn-group">
                                                <button class="btn btn-sucess btn-xs" href="oss/{{ $os->idOS}}/create"><span class="glyphicon glyphicon-plus"></span></button>
                                            </div>
                                            <div role="group" class="btn-group">
                                                {!!Form::open(['url' => 'oss/'.$os->idOS, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse OS?");'])!!}
                                                <button class="btn btn-warning btn-xs" href="oss/{{ $os->idOS}}/edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                                {!! Form::close() !!}
                                            </div>
                                            <div role="group" class="btn-group">
                                                {!!Form::open(['url' => 'oss/'.$os->idOS, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse OS?");'])!!}
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
                        <a href="oss/create">
                            <button type="button" class="btn btn-primary">Cadastrar OS</button>
                        </a>
                    </div>
                </div>
            </div>
@endsection