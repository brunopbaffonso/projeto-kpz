@extends('layouts.padrao')

@section('content')
   <div id="page-wrapper">

    <div class="header"> 
        <h1 class="page-header">Adicionar Subproduto</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('subprodutos') }}">Lista de Subprodutos</a></li>
                <li class="active">Adicionar Subproduto</li>
            </ol>               
    </div>

    <div id="page-inner">

        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="card-title">
                            <div class="title">Novo Subproduto</div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                        {!!Form::open(['url' => 'subprodutos/', 'method' => 'post'])!!}

                            <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                                <label for="tipo" class="col-md-2 control-label">Tipo</label>

                                <div class="col-md-8">
                                    <input id="tipo" type="text" class="form-control" name="tipo" value="{{ old('tipo') }}" required autofocus>

                                    @if ($errors->has('tipo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('quantidade') ? ' has-error' : '' }}">
                                <label for="quantidade" class="col-md-2 control-label">Quantidade</label>

                                <div class="col-md-8">
                                    <input id="quantidade" type="number" class="form-control" name="quantidade" value="{{ old('quantidade') }}" required autofocus>

                                    @if ($errors->has('quantidade'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('quantidade') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('comprimento') ? ' has-error' : '' }}">
                                <label for="comprimento" class="col-md-2 control-label">comprimento</label>

                                <div class="col-md-8">
                                    <input id="comprimento" type="number" class="form-control" name="comprimento" value="{{ old('comprimento') }}" required autofocus>

                                    @if ($errors->has('comprimento'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('comprimento') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('largura') ? ' has-error' : '' }}">
                                <label for="largura" class="col-md-2 control-label">Largura</label>

                                <div class="col-md-8">
                                    <input id="largura" type="number" class="form-control" name="largura" value="{{ old('largura') }}" required autofocus>

                                    @if ($errors->has('largura'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('largura') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                        Cadastrar!
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
