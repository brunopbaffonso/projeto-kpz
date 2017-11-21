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
                        <div class="form-horizontal">
                            {!!Form::open(['url' => 'subprodutos/'.$subproduto->idSubproduto, 'method' => 'put'])!!}
                            <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                                <label for="tipo" class="col-md-4 control-label">Tipo:</label>

                                <div class="col-md-6">
                                    <input id="tipo" type="text" class="form-control" name="tipo" value="{{ $subproduto->tipo }}" required autofocus>

                                    @if ($errors->has('tipo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('quantidade') ? ' has-error' : '' }}">
                                <label for="quantidade" class="col-md-4 control-label">Quantidade:</label>

                                <div class="col-md-6">
                                    <input id="quantidade" type="number" class="form-control" name="quantidade" value="{{ $subproduto->quantidade }}" required autofocus>

                                    @if ($errors->has('quantidade'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('quantidade') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('comprimento') ? ' has-error' : '' }}">
                                <label for="comprimento" class="col-md-4 control-label">Comprimento:</label>

                                <div class="col-md-6">
                                    <input id="comprimento" type="number" class="form-control" name="comprimento" value="{{ $subproduto->comprimento }}" required autofocus>

                                    @if ($errors->has('comprimento'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('comprimento') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('largura') ? ' has-error' : '' }}">
                                <label for="largura" class="col-md-4 control-label">Largura:</label>

                                <div class="col-md-6">
                                    <input id="largura" type="number" class="form-control" name="largura" value="{{ $subproduto->largura }}" required autofocus>

                                    @if ($errors->has('largura'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('largura') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('unidadeMedida') ? ' has-error' : '' }}">
                                <label for="unidadeMedida" class="col-md-4 control-label">Unidade Medida:</label>

                                <div class="col-md-6">
                                    <input id="unidadeMedida" type="text" class="form-control" name="unidadeMedida" value="{{ $subproduto->unidadeMedida }}" required autofocus>

                                    @if ($errors->has('unidadeMedida'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('unidadeMedida') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('cor_idCor') ? ' has-error' : '' }}">
                                <label for="cor_idCor" class="col-md-4 control-label">Cor:</label>

                                <div class="col-md-6">
                                    <input id="cor_idCor" type="number" class="form-control" name="cor_idCor" value="{{ $subproduto->cor_idCor }}" required autofocus>

                                    @if ($errors->has('cor_idCor'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cor_idCor') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Salvar Alterações!
                                    </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection