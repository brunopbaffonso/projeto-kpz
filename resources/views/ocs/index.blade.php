@extends('layouts.padrao')
@section('content')
<div id="page-wrapper" >
    <div class="header"> 
        <h1 class="page-header">Ordens de Compras</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li class="active">Lista de Ordens de Compras</li>
                <li><a href="{{ url('ocs/create') }} ">Adicionar Ordem de Compra</a></li>
            </ol>               
    </div>
    {!!Form::open(['url' => 'ocs', 'method' => 'get', 'class' => 'form-inline text-center'])!!}
    <div id="page-inner">  
    <div class="form-group">
        <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
        <input type="text" class="form-control" name="nome" placeholder="Ex: Tipo/Observacoes">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
    {!! Form::close() !!}
  <div class="col-md-12">
            <!--   Basic Table  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                          Lista de Ordem de Compras
                    </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Código</td>
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
                                                 <div role="group" class="btn-group">
                                                    {!!Form::open(['url' => 'ocs/'.$oc->idOC, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse OC?");'])!!}
                                                    <button class="btn btn-warning btn-xs" href="ocs/{{ $oc->idOC }}/edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                                    {!! Form::close() !!}
                                                </div>
                                                 <div role="group" class="btn-group">
                                                    {!!Form::open(['url' => 'ocs/'.$oc->idOC, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse OC?");'])!!}
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
                    <a href="clientes/create">
                        <button type="button" class="btn btn-primary">Cadastrar OC</button>
                     </a>
                </div>
            </div>
</div>
@endsection