@extends('layouts.padrao')

@section('content')
    <div id="page-wrapper">

        <div class="header">
            <h1 class="page-header">Adicionar Insumo</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('insumos') }}">Listar Insumos</a></li>
                <li class="active">Adicionar Insumo</li>
            </ol>
        </div>

        <div id="page-inner">

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="card-title">
                                <div class="title">Editar Insumos</div>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="form-horizontal">
                                {!!Form::open(['url' => 'insumos/'.$insumo->idInsumo, 'method' => 'put'])!!}

                                <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                                    <label for="nome" class="col-md-2 control-label">Descrição:</label>

                                    <div class="col-md-8">
                                        <input id="nome" type="text" class="form-control" name="nome" value="{{ $insumo->nome }}" placeholder="Ex: Manta/Tinta"  data-toggle="tooltip" data-placement="top" title="Esse campo aceita somente caracteres minúsculo/MAIÚSCULOS" required autofocus>

                                        @if ($errors->has('nome'))
                                            <span class="help-block">
                                                <strong>{{ $insumo->nome }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('quantidade') ? ' has-error' : '' }}">
                                    <label for="quantidade" class="col-md-2 control-label">Quantidade:</label>

                                    <div class="col-md-8">
                                        <input id="quantidade" type="text" class="form-control" name="quantidade" value="{{ $insumo->quantidade }}" placeholder="Ex: 1 (Rolo)/10 (Latas)" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9" required autofocus>

                                        @if ($errors->has('quantidade'))
                                            <span class="help-block">
                                                <strong>{{ $insumo->quantidade }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('comprimento') ? ' has-error' : '' }}">
                                    <label for="comprimento" class="col-md-2 control-label">Comprimento:</label>

                                    <div class="col-md-4">
                                        <input id="comprimento" type="text" class="form-control" name="comprimento" value="{{ $insumo->comprimento }}" placeholder="Ex: 0.60/0.90" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9 separado por ponto" required autofocus>

                                        @if ($errors->has('comprimento'))
                                            <span class="help-block">
                                        <strong>{{ $insumo->comprimento }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('largura') ? ' has-error' : '' }}">
                                    <label for="largura" class="col-md-2 control-label">Largura:</label>

                                    <div class="col-md-8">
                                        <input id="largura" type="text" class="form-control" name="largura" value="{{ $insumo->largura }}" placeholder="Ex: 0.60/0.90" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9 separado por ponto" required autofocus>

                                        @if ($errors->has('largura'))
                                            <span class="help-block">
                                        <strong>{{ $insumo->largura }}</strong>
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


                                <div class="form-group{{ $errors->has('precoUnit') ? ' has-error' : '' }}">
                                    <label for="precoUnit" class="col-md-2 control-label">Preço Unitário:</label>

                                    <div class="col-md-8">
                                        <input id="precoUnit" type="text" class="form-control"  value="{{ $insumo->precoUnit }}" name="precoUnit" placeholder="Ex: R$ 10.00/ R$270.55" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9 separado por ponto" required autofocus>

                                        @if ($errors->has('precoUnit'))
                                            <span class="help-block">
                                        <strong>{{ $insumo->precoUnit }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cor" class="col-md-2 control-label">Cor:</label>
                                    <div class="col-md-8" name="cor_idCor">
                                        <select class="form-control form-control-lg">
                                            @foreach($cor as $c)
                                                @if($c->idCor == $insumo->cor_idCor )
                                                    <option value="{{$c->idCor}}" class="dropdown-item" selected>{{$c->nome}}</option>
                                                @else
                                                    <option value="{{$c->idCor}}" class="dropdown-item">{{$c->nome}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tipoManta" class="col-md-2 control-label">*Tipo Manta:</label>
                                    <div class="col-md-8" name="tipoManta">
                                        <select name="tipoManta" class="form-control form-control-lg">
                                            @foreach($manta as $m)
                                                @if($m->idTipoManta == $insumo->tipoManta_idTipoManta )
                                                    <option value="{{$m->idTipoManta}}" class="dropdown-item" selected>{{$m->nome}}</option>
                                                @else
                                                    <option value="{{$m->idTipoManta}}" class="dropdown-item">{{$m->nome}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tipoMaterial" class="col-md-2 control-label">*Tipo Material:</label>
                                    <div class="col-md-8" name="tipoMaterial">
                                        <select name="tipoMaterial" class="form-control form-control-lg">
                                            @foreach($material as $m2)
                                                @if($m2->idTipoMaterial == $insumo->tipoMaterial_idTipoManterial )
                                                    <option value="{{$m2->idTipoMaterial}}" class="dropdown-item" selected>{{$m2->nome}}</option>
                                                @else
                                                    <option value="{{$m2->idTipoMaterial}}" class="dropdown-item">{{$m2->nome}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <br/>

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
        </div>
@endsection