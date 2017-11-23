@extends('layouts.padrao')

@section('content')
    <div id="page-wrapper">

        <div class="header">
            <h1 class="page-header">Adicionar Item</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('items') }}">Listar Itens</a></li>
                <li class="active">Adicionar Item</li>
            </ol>
        </div>

        <div id="page-inner">

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="card-title">
                                <div class="title">Editar Item</div>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="form-horizontal">
                            {!!Form::open(['url' => 'items/'.$item->idItem, 'method' => 'put'])!!}

                            <div class="form-group{{ $errors->has('quantidade') ? ' has-error' : '' }}">
                                <label for="quantidade" class="col-md-2 control-label">Quantidade:</label>

                                <div class="col-md-8">
                                    <input id="quantidade" type="number" class="form-control" name="quantidade" value="{{ $item->quantidade }}" required autofocus>

                                    @if ($errors->has('quantidade'))
                                        <span class="help-block">
                                        <strong>{{ $item->quantidade }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('comprimento') ? ' has-error' : '' }}">
                                <label for="comprimento" class="col-md-2 control-label">Comprimento</label>

                                <div class="col-md-8">
                                    <input id="comprimento" type="number" class="form-control" name="comprimento" value="{{ $item->comprimento }}" required autofocus>

                                    @if ($errors->has('comprimento'))
                                        <span class="help-block">
                                        <strong>{{ $item->comprimento }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('largura') ? ' has-error' : '' }}">
                                <label for="largura" class="col-md-2 control-label">Largura</label>

                                <div class="col-md-8">
                                    <input id="largura" type="number" class="form-control" name="largura" value="{{ $item->largura }}" required autofocus>

                                    @if ($errors->has('largura'))
                                        <span class="help-block">
                                        <strong>{{ $item->largura }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('unidadeMedida') ? ' has-error' : '' }}">
                                <label for="unidadeMedida" class="col-md-2 control-label">Unidade de Medida</label>

                                <div class="col-md-8">
                                    <input id="unidadeMedida" type="text" class="form-control" name="unidadeMedida" value="{{ $item->unidadeMedida }}" required autofocus>

                                    @if ($errors->has('unidadeMedida'))
                                        <span class="help-block">
                                        <strong>{{ $item->unidadeMedida }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('borda') ? ' has-error' : '' }}">
                                <label for="borda" class="col-md-2 control-label">Borda</label>

                                <div class="col-md-8">
                                    <input id="borda" type="number" class="form-control" name="borda" value="{{ $item->borda }}" required autofocus>

                                    @if ($errors->has('borda'))
                                        <span class="help-block">
                                        <strong>{{ $item->borda }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('arte') ? ' has-error' : '' }}">
                                <label for="arte" class="col-md-2 control-label">Arte</label>

                                <div class="col-md-8">
                                    <input id="arte" type="file"   value="{{ $item->arte }}" name="arte" required autofocus>

                                    @if ($errors->has('arte'))
                                        <span class="help-block">
                                        <strong>{{ $item->arte }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('precoUnit') ? ' has-error' : '' }}">
                                <label for="precoUnit" class="col-md-2 control-label">Preço Unitário</label>

                                <div class="col-md-8">
                                    <input id="precoUnit" type="number" class="form-control"  value="{{ $item->precoUnit }}" name="precoUnit" required autofocus>

                                    @if ($errors->has('precoUnit'))
                                        <span class="help-block">
                                        <strong>{{ $item->precoUnit }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('fonte') ? ' has-error' : '' }}">
                                <label for="fonte" class="col-md-2 control-label">Fonte</label>

                                <div class="col-md-8">
                                    <input id="fonte" type="text" class="form-control"  value="{{ $item->fonte }}" name="fonte" required autofocus>

                                    @if ($errors->has('fonte'))
                                        <span class="help-block">
                                        <strong>{{ $item->fonte }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-2">
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