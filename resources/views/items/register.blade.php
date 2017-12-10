@extends('layouts.padrao')

@section('content')
    <div id="page-wrapper">

        <div class="header">
            <h1 class="page-header">Itens</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('items') }}">Listar Itens</a></li>
                <li class="active"><a>Adicionar Item</a></li>
            </ol>
        </div>

        <div id="page-inner">

                <div id="error-div" class='alert-danger'>
                    <ul id="error-page">
                    </ul>
                </div>

            @if (Session::has('mensagem'))
            <!-- mostra este bloco se existe uma chave na sessão chamada mensagens-sucesso -->
                <div class='alert alert-success'>
                    @if (is_array(Session::get('mensagem')))
                        <ul>
                            @foreach (Session::get('mensagem') as $msg)
                                <li>{{$msg}}</li>
                            @endforeach
                        </ul>
                    @else
                        {{Session::get('mensagem')}}
                    @endif
                </div>
            @endif

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="card-title">
                                <div class="title">Novo Item</div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-horizontal" for="quantidade" class="col-md-2 control-label">Código OS:</label>  {{ $OS }}

                                    <div class="form-group{{ $errors->has('quantidade') ? ' has-error' : '' }}">
                                        <label for="quantidade" class="col-md-2 control-label">Quantidade:</label>

                                        <div class="col-md-8">
                                            <input id="quantidade" type="text" class="form-control" name="quantidade" value="{{ old('quantidade') }}" pattern="[0-9]+$" placeholder="Ex: 1(tapete)/10 (chinelos)" ata-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9" required autofocus>

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
                                            <input id="comprimento" type="text" class="form-control" name="comprimento" value="{{ old('comprimento') }}" placeholder="Ex: 0.60/0.90" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9 separado por ponto" required autofocus>

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
                                            <input id="largura" type="text" class="form-control" name="largura" value="{{ old('largura') }}" placeholder="Ex: 0.60/0.90" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9 separado por ponto" required autofocus>

                                            @if ($errors->has('largura'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('largura') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                    <label for="unidadeMedida" class="col-md-2 control-label">*Unidade Medida:</label>
                                    <div class="col-md-8" name="unidadeMedida">
                                            <select name="unidadeMedida" class="form-control form-control-lg">
                                                <option value="mm" class="dropdown-item">mm (Milimetro)</option>
                                                <option value="cm" class="dropdown-item">cm (Centimetros)</option>
                                                <option value="dm" class="dropdown-item">dm (Decimetros)</option>
                                                <option value="m" class="dropdown-item">m (Metros)</option>
                                                <option value="dam" class="dropdown-item">dam (Decametros)</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                    <label for="borda" class="col-md-2 control-label">*Borda:</label>
                                    <div class="col-md-8" name="borda">
                                            <select name="borda" class="form-control form-control-lg">
                                                <option value="0" class="form-control">Sem Borda</option>
                                                <option value="1" class="form-control">Pintada</option>
                                                <option value="2" class="form-control">Vulcanizada</option>
                                                <option value="3" class="form-control">Rebaixada</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('arte') ? ' has-error' : '' }}">
                                        <label for="arte" class="col-md-2 control-label">Arte:</label>

                                        <div class="col-md-8">
                                            <input id="arte" type="file" name="arte" value="{{ old('arte') }}" data-toggle="tooltip" data-placement="top" title="Tooltip on top" autofocus>

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
                                            <input id="precoUnit" type="text" class="form-control" name="precoUnit" value="{{ old('precoUnit') }}" placeholder="Ex: 10.00/300.50" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9 separado por ponto" required autofocus>

                                            @if ($errors->has('precoUnit'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('precoUnit') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                        <div class="form-group">
                                            <div class="col-md-4 col-md-offset-2">
                                                <button type="submit" name="submit" value="0" class="btn btn-primary">
                                                    Cadastrar Novo Item
                                                </button>

                                                <button type="submit" name="submit" value="1" class="btn btn-success">
                                                    Cadastrar & Finalizar!
                                                </button>
                                            </div>

                                            {{--<div class="col-md-4 col-md-offset-2">--}}
                                                {{----}}
                                            {{--</div>--}}
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
