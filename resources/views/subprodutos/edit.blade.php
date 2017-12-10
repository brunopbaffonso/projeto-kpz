@extends('layouts.padrao')

@section('content')
    <div id="page-wrapper">

        <div class="header">
            <h1 class="page-header">Adicionar Subproduto</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('subprodutos') }}">Listar Subprodutos</a></li>
                <li class="active">Adicionar Subproduto</li>
            </ol>
        </div>

        <div id="page-inner">

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="card-title">
                                <div class="title">Editando Subproduto</div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-horizontal">
                                {!!Form::open(['url' => 'subprodutos/'.$subproduto->idSubproduto, 'method' => 'put'])!!}
                                <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                                    <label for="tipo" class="col-md-2 control-label">*Descrição:</label>

                                    <div class="col-md-8">
                                        <input id="tipo" type="text" class="form-control" name="tipo" value="{{ $subproduto->tipo }}" placeholder="chinelo Preto/ chaveiro" maxlength="255" pattern="[a-zA-Z\s]+$" data-toggle="tooltip" data-placement="top" title="Esse campo aceita somente caracteres minúsculo/MAIÚSCULOS" required autofocus>

                                        @if ($errors->has('tipo'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tipo') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('quantidade') ? ' has-error' : '' }}">
                                    <label for="quantidade" class="col-md-2 control-label">*Quantidade:</label>

                                    <div class="col-md-8">
                                        <input id="quantidade" type="text" class="form-control" name="quantidade" value="{{ $subproduto->quantidade }}" laceholder="Ex: 1 (Rolo)/10 (Latas)" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9" required autofocus>

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
                                        <input id="comprimento" type="text" class="form-control" name="comprimento" value="{{ $subproduto->comprimento }}" placeholder="Ex: 0.60/0.90" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9 separado por ponto" required autofocus>

                                        @if ($errors->has('comprimento'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('comprimento') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('largura') ? ' has-error' : '' }}">
                                    <label for="largura" class="col-md-2 control-label">Largura:</label>

                                    <div class="col-md-8">
                                        <input id="largura" type="text" class="form-control" name="largura" value="{{ $subproduto->largura }}" placeholder="Ex: 0.60/0.90" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9 separado por ponto" required autofocus>

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
                                            @if($subproduto->unidadeMedida == 'mm')
                                                <option value="mm" class="dropdown-item" selected>mm (Milimetro)</option>
                                            @else
                                                <option value="mm" class="dropdown-item">mm (Milimetro)</option>
                                            @endif
                                            @if($subproduto->unidadeMedida == 'cm')
                                                <option value="cm" class="dropdown-item" selected>cm (Centimetros)</option>
                                            @else
                                                <option value="cm" class="dropdown-item">cm (Centimetros)</option>
                                            @endif
                                            @if($subproduto->unidadeMedida == 'dm')
                                                <option value="dm" class="dropdown-item" selected>dm (Decimetros)</option>
                                            @else
                                                <option value="dm" class="dropdown-item">dm (Decimetros)</option>
                                            @endif
                                            @if($subproduto->unidadeMedida == 'm')
                                                <option value="m" class="dropdown-item" selected>m (Metros)</option>
                                            @else
                                                <option value="m" class="dropdown-item">m (Metros)</option>
                                            @endif
                                            @if($subproduto->unidadeMedida == 'dam')
                                                <option value="dam" class="dropdown-item" selected>dam (Decametros)</option>
                                            @else
                                                <option value="dam" class="dropdown-item">dam (Decametros)</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cor" class="col-md-2 control-label">Cor:</label>
                                    <div class="col-md-8" name="cor_idCor">
                                        <select class="form-control form-control-lg">
                                            @foreach($cor as $c)
                                                @if($c->idCor == $subproduto->cor_idCor )
                                                    <option value="{{$c->idCor}}" class="dropdown-item" selected>{{$c->nome}}</option>
                                                @else
                                                    <option value="{{$c->idCor}}" class="dropdown-item">{{$c->nome}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br />

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