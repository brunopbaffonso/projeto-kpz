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
                                <div class="title">Novo Subproduto</div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-horizontal">
                                {!!Form::open(['url' => 'subprodutos/', 'method' => 'post'])!!}

                                <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                                    <label for="tipo" class="col-md-2 control-label">*Descrição:</label>

                                    <div class="col-md-8">
                                        <input id="tipo" type="text" class="form-control" name="tipo" value="{{ old('tipo') }}" placeholder="Chinelo Preto/ Chaveiro" maxlength="255" pattern="[a-zA-Z\s]+$" data-toggle="tooltip" data-placement="top" title="Esse campo aceita somente caracteres minúsculo/MAIÚSCULOS" required autofocus>

                                        @if ($errors->has('tipo'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('quantidade') ? ' has-error' : '' }}">
                                    <label for="quantidade" class="col-md-2 control-label">Quantidade:</label>

                                    <div class="col-md-8">
                                        <input id="quantidade" type="text" class="form-control" name="quantidade" value="{{ old('quantidade') }}" placeholder="Ex: 1 (Rolo) / 10 (Latas)" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9" required autofocus>

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
                                    <label for="largura" class="col-md-2 control-label">Largura:</label>

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
                                <label for="largura" class="col-md-2 control-label">Cor:</label>
                                <div class="col-md-8" name="cor_idCor">
                                    <select class="form-control form-control-lg">
                                        <option value="K07" class="dropdown-item">NÃO INFORMADO</option>
                                        <option value="K01" class="dropdown-item">Cinza</option>
                                        <option value="K02" class="dropdown-item">Grafite</option>
                                        <option value="K03" class="dropdown-item">Preto</option>
                                        <option value="K04" class="dropdown-item">Marrom</option>
                                        <option value="K05" class="dropdown-item">Bege</option>
                                        <option value="K06" class="dropdown-item">Ouro</option>
                                        <option value="K08" class="dropdown-item">Amarelo</option>
                                        <option value="K09" class="dropdown-item">Laranja</option>
                                        <option value="K10" class="dropdown-item">Vermelho</option>
                                        <option value="K11" class="dropdown-item">Bordo</option>
                                        <option value="K12" class="dropdown-item">Azul Marinho</option>
                                        <option value="K13" class="dropdown-item">Azul Royal</option>
                                        <option value="K14" class="dropdown-item">Salmão</option>
                                        <option value="K15" class="dropdown-item">Verde Bandeira</option>
                                        <option value="K16" class="dropdown-item">Verde Limão</option>
                                        <option value="K17" class="dropdown-item">Prata</option>
                                        <option value="K18" class="dropdown-item">Lilás</option>
                                        <option value="K19" class="dropdown-item">Azul Marítimo</option>
                                        <option value="K20" class="dropdown-item">Verde Floresta</option>
                                        <option value="K21" class="dropdown-item">Pink</option>
                                        <option value="K22" class="dropdown-item">Verde Água</option>
                                        <option value="K23" class="dropdown-item">Verde Piscina</option>
                                        <option value="K24" class="dropdown-item">Azul Bebê</option>
                                        <option value="K25" class="dropdown-item">Rosa Bebê</option>
                                        <option value="K26" class="dropdown-item">Roxo</option>
                                        <option value="K27" class="dropdown-item">Púrpura</option>
                                    </select>
                                </div>
                                </div>
                                <br />

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
