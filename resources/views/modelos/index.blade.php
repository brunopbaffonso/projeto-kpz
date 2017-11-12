@extends('layouts.padrao')
@section('content')
<div id="page-wrapper" >
    <div class="header"> 
        <h1 class="page-header">Modelos</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li class="active">Lista de Modelos</li>
                <li><a href="{{ url('modelos/create') }}">Adicionar Modelos</a></li>
            </ol>               
    </div>
    {!!Form::open(['url' => 'modelos', 'method' => 'get', 'class' => 'form-inline text-center'])!!}
    <div id="page-inner"> 
        <div class="form-group">
            <label for="inputEmail3" class=" col-md-3 control-label" style="padding-top: 2%;">Pesquisa &nbsp;</label>
            <input type="text" class="form-control" name="nome" placeholder="Ex: Nome">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    {!! Form::close() !!}
      <div class="col-md-12">
            <!--   Basic Table  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                          Lista de Modelos
                    </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                <tr>
                                    <td>Código</td>
                                    <td>Nome</td>
                                    <td class="col-md-2 "></td>
                                </tr>
                                @foreach ($modelo as $modelo)
                                    <tr>
                                        <td>{{ $modelo->idModelo}}</td>
                                        <td>{{ $modelo->nome}}</td>
                                        <td>
                                            <div role="group" class="btn-group">
                                                {!!Form::open(['url' => 'modelos/'.$modelo->idModelo, 'method' => 'edit', 'onSubmit' => 'return confirm("Você deseja realmente Editar esse Modelo?");'])!!}
                                                    <button class="btn btn-warning btn-xs" href="modelos/{{ $modelo->idModelo}}/edit">
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </button>
                                                   {!! Form::close() !!}
                                            </div>
                                            <div role="group" class="btn-group">
                                                 {!!Form::open(['url' => 'modelos/'.$modelo->idModelo, 'method' => 'delete', 'onSubmit' => 'return confirm("Você deseja realmente exluir esse Modelo?");'])!!}
                                                <button type="submit" name="nada" class="btn btn-danger btn-xs">
                                                    <span class="glyphicon glyphicon-trash" ></span>
                                                </button>
                                                {!! Form::close() !!}
                                            </div>

                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                       </div>
                    <div class="panel-body" align="left">
                        <a href="modelos/create">
                            <button type="button" class="btn btn-primary">Cadastrar Modelo</button>
                         </a>
                    </div>
        </div>
    </div>
</div>
@endsection