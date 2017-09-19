@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Subproduto</div>

                    <div class="panel-body">
                    <!-- <form class="form-horizontal" method="POST" action="{{ route('register') }}"> -->

                        {!!Form::open(['url' => '/subproduto/'.$subproduto->idSubproduto, 'method' => 'post'])!!}

                        <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                            <label for="tipo" class="col-md-4 control-label">Tipo</label>

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
                            <label for="quantidade" class="col-md-4 control-label">Quantidade</label>

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
                            <label for="comprimento" class="col-md-4 control-label">Comprimento</label>

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
                            <label for="largura" class="col-md-4 control-label">Largura</label>

                            <div class="col-md-6">
                                <input id="largura" type="number" class="form-control" name="largura" value="{{ $subproduto->largura }}" required autofocus>

                                @if ($errors->has('largura'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('largura') }}</strong>
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
@endsection