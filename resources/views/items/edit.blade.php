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
                                        <input id="quantidade" type="number" class="form-control" name="quantidade" value="{{ $item->quantidade }}" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9" pattern="[0-9]+$" required autofocus>

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
                                        <input id="comprimento" type="number" class="form-control" name="comprimento" value="{{ $item->comprimento }}" placeholder="Ex: 0.60/0.90" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9 separado por ponto" required autofocus>

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
                                        <input id="largura" type="number" class="form-control" name="largura" value="{{ $item->largura }}" placeholder="Ex: 0.60/0.90" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9 separado por ponto" required autofocus>

                                        @if ($errors->has('largura'))
                                            <span class="help-block">
                                        <strong>{{ $item->largura }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label for="unidadeMedida" class="col-md-2 control-label">*Unidade Medida:</label>
                                    <div class="col-md-8" name="unidadeMedida">
                                        <select name="unidadeMedida" class="form-control form-control-lg">
                                            @if($insumo->unidadeMedida == 'mm')
                                                <option value="mm" class="dropdown-item" selected>mm (Milimetro)</option>
                                            @else
                                                <option value="mm" class="dropdown-item">mm (Milimetro)</option>
                                            @endif
                                            @if($insumo->unidadeMedida == 'cm')
                                                <option value="cm" class="dropdown-item" selected>cm (Centimetros)</option>
                                            @else
                                                <option value="cm" class="dropdown-item">cm (Centimetros)</option>
                                            @endif
                                            @if($insumo->unidadeMedida == 'dm')
                                                <option value="dm" class="dropdown-item" selected>dm (Decimetros)</option>
                                            @else
                                                <option value="dm" class="dropdown-item">dm (Decimetros)</option>
                                            @endif
                                            @if($insumo->unidadeMedida == 'm')
                                                <option value="m" class="dropdown-item" selected>m (Metros)</option>
                                            @else
                                                <option value="m" class="dropdown-item">m (Metros)</option>
                                            @endif
                                            @if($insumo->unidadeMedida == 'dam')
                                                <option value="dam" class="dropdown-item" selected>dam (Decametros)</option>
                                            @else
                                                <option value="dam" class="dropdown-item">dam (Decametros)</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="idBorda" class="col-md-2 control-label">*Borda:</label>
                                    <div class="col-md-8" name="idBorda">
                                        <select name="idBorda" class="form-control form-control-lg">
                                            @foreach($borda as $b)
                                                @if($b->idBorda == $os->borda_idBorda )
                                                    <option value="{{$m->idBorda}}" class="dropdown-item" selected>{{$b->nome}}</option>
                                                @else
                                                    <option value="{{$m->idBorda}}" class="dropdown-item">{{$b->nome}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
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
                                    <label for="arte" class="col-md-2 control-label">Arte</label>

                                    <div class="col-md-8">
                                        <input id="arte" type="file"   value="{{ $item->arte }}" name="arte" data-toggle="tooltip" data-placement="top" title="Tooltip on top" required autofocus>

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
                                        <input id="precoUnit" type="number" class="form-control"  value="{{ $item->precoUnit }}" name="precoUnit" placeholder="Ex: 10.00/300.50" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9 separado por ponto" required autofocus>

                                        @if ($errors->has('precoUnit'))
                                            <span class="help-block">
                                        <strong>{{ $item->precoUnit }}</strong>
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