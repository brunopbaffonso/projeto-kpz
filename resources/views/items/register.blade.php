@extends('layouts.padrao')

@section('content')
    <div id="page-wrapper">

        <div class="header">
            <h1 class="page-header">Itens</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('items') }}">Listar Itens</a></li>
                <li class="active">Adicionar Item</a></li>
            </ol>
        </div>

        <div id="page-inner">

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="card-title">
                                <div class="title">Novo Item</div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-horizontal" for="quantidade" class="col-md-2 control-label">Código OS:</label>  {{ $OS->idOS }}
                                <div class="form-horizontal">
                                    {!!Form::open(['url' => 'items/', 'method' => 'post', 'enctype' => 'multipart/form-data'])!!}
                                    <input id="os_idOS" type="hidden" class="form-control" name="os_idOS" value="{{ $OS->idOS }}">

                                    <div class="form-group{{ $errors->has('quantidade') ? ' has-error' : '' }}">
                                        <label for="quantidade" class="col-md-2 control-label">Quantidade:</label>

                                        <div class="col-md-8">
                                            <input id="quantidade" type="number" class="form-control" name="quantidade" value="{{ old('quantidade') }}" placeholder="Ex: 1/10" required autofocus>

                                            @if ($errors->has('quantidade'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('quantidade') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('comprimento') ? ' has-error' : '' }}">
                                        <label for="comprimento" class="col-md-2 control-label">Comprimento:</label>

                                        <div class="col-md-8">
                                            <input id="comprimento" type="number" class="form-control" name="comprimento" value="{{ old('comprimento') }}" placeholder="Ex: 0.90/ 1.20" required autofocus>

                                            @if ($errors->has('comprimento'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('comprimento') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('largura') ? ' has-error' : '' }}">
                                        <label for="comprimento" class="col-md-2 control-label">Largura:</label>

                                        <div class="col-md-8">
                                            <input id="largura" type="number" class="form-control" name="largura" value="{{ old('largura') }}" f required autofocus>

                                            @if ($errors->has('largura'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('largura') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('unidadeMedida') ? ' has-error' : '' }}">
                                        <label for="unidadeMeidada" class="col-md-2 control-label">Unidade de Medida</label>
                                        <select name="unidadeMedida">
                                            <option value="mm" class="form-control">mm (Milimetro)</option>
                                            <option value="cm" class="form-control">cm (Centimetros)</option>
                                            <option value="dm" class="form-control">dm (Decimetros)</option>
                                            <option value="m" class="form-control">m (Metros)</option>
                                            <option value="dam" class="form-control">dam (Decametros)</option>
                                        </select>
                                    </div>

                                    <div class="form-group{{ $errors->has('borda') ? ' has-error' : '' }}">
                                        <label for="borda" class="col-md-2 control-label">Borda</label>
                                        <select name="borda">
                                            <option value="0" class="form-control">Sem Borda</option>
                                            <option value="1" class="form-control">Pintada</option>
                                            <option value="2" class="form-control">Vulcanizada</option>
                                            <option value="3" class="form-control">Rebaixada</option>
                                        </select>
                                    </div>

                                    <div class="form-group{{ $errors->has('arte') ? ' has-error' : '' }}">
                                        <label for="arte" class="col-md-2 control-label">Arte:</label>

                                        <div class="col-md-8">
                                            <input id="arte" type="file" name="arte" value="{{ old('arte') }}" autofocus>

                                            @if ($errors->has('arte'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('arte') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('precoUnit') ? ' has-error' : '' }}">
                                        <label for="precoUnit" class="col-md-2 control-label">Preço Unitário:</label>

                                        <div class="col-md-8">
                                            <input id="precoUnit" type="number" class="form-control" name="precoUnit" value="{{ old('precoUnit') }}" required autofocus>

                                            @if ($errors->has('precoUnit'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('precoUnit') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-4 col-md-offset-2">
                                            <button type="submit" id="submit" name="submit" value="0" class="btn btn-primary">
                                                Cadastrar & Finalizar!
                                            </button>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-4 col-md-offset-2">
                                            <button type="submit" id="submit" name="submit" value="1" class="btn btn-primary">
                                                Novo Item
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
