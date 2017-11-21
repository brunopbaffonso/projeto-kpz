@extends('layouts.padrao')

@section('content')
    <div id="page-wrapper">

        <div class="header">
            <h1 class="page-header">Adicionar Ordem de Serviço</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('oss') }}  ">Lista de Serviços</a></li>
                <li class="active">Adicionar Ordem de Serviço</li>
            </ol>
        </div>

        <div id="page-inner">

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="card-title">
                                <div class="title">Nova Ordem de Serviço</div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-horizontal">
                                {!!Form::open(['url' => 'oss/', 'method' => 'post'])!!}

                                <div class="form-group{{ $errors->has('precoTotal') ? ' has-error' : '' }}">
                                    <label for="precoTotal" class="col-md-2 control-label">Preço Total:</label>

                                    <div class="col-md-8">
                                        <input id="precoTotal" type="number" class="form-control" name="precoTotal" value="{{ old('precoTotal') }}" required autofocus>

                                        @if ($errors->has('precoTotal'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('precoTotal') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('desconto') ? ' has-error' : '' }}">
                                    <label for="desconto" class="col-md-2 control-label">Desconto:</label>

                                    <div class="col-md-8">
                                        <input id="desconto" type="number" class="form-control" name="desconto" value="{{ old('desconto') }}" autofocus>

                                        @if ($errors->has('desconto'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('desconto') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('formaPgto') ? ' has-error' : '' }}">
                                    <label for="formaPgto" class="col-md-2 control-label">Forma de Pagamento:</label>

                                    <div class="col-md-8">
                                        <input id="formaPgto" type="text" class="form-control" name="formaPgto" value="{{ old('formaPgto') }}" required autofocus>

                                        @if ($errors->has('formaPgto'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('formaPgto') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('observacoes') ? ' has-error' : '' }}">
                                    <label for="observacoes" class="col-md-2 control-label">Observações:</label>

                                    <div class="col-md-8">
                                        <textarea id="observacoes" class="form-control" name="observacoes" value="{{ old('observacoes') }}" autofocus ></textarea>

                                        @if ($errors->has('observacoes'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('observacoes') }}</strong>
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
        </div>
    </div>
@endsection
