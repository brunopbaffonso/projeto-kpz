@extends('layouts.padrao')

@section('content')
    <div id="page-wrapper">

        <div class="header">
            <h1 class="page-header">Adicionar Modelo</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('modelos') }} ">Lista de Modelos</a></li>
                <li class="active">Adicionar Modelo</li>
            </ol>
        </div>

        <div id="page-inner">

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="card-title">
                                <div class="title">Editar Modelo</div>
                            </div>
                        </div>

                        <div class="panel-body">
                            {!!Form::open(['url' => 'modelos/'.$modelo->idModelo, 'method' => 'put'])!!}

                            <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                                <label for="nome" class="col-md-2 control-label">Nome</label>

                                <div class="col-md-8">
                                    <input id="nome" type="text" class="form-control" name="nome" value="{{ $modelo->nome }}" required autofocus>

                                    @if ($errors->has('nome'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                        Salvar Alterações
                                    </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection