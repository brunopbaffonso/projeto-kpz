@extends('layouts.padrao')
@section('content')
    <div id="page-wrapper" >
        <div class="header">
            <h1 class="page-header">Usuários</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li class="active">Listar Usuários</li>
                <li><a href="{{ url('usuarios/create') }}">Adicionar Usuário</a></li>
            </ol>
        </div>
        <div class="col-md-12">
            <!--   Basic Table  -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de Usuarios
                </div>
                <div class="panel-body">
                    {!!$grid->make()!!}
                </div>
                <div class="panel-body" align="left">
                    <a href="usuarios/create">
                        <button type="button" class="btn btn-primary">Cadastrar Usuário</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection