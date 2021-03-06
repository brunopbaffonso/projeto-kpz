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
                                <div class="title">Novo Insumo</div>
                            </div>
                        </div>
                        <div class="panel-body">
                            {!!Form::open(['url' => 'insumos/', 'method' => 'post'])!!}

                            <input type="hidden" name="oc_idOC" value="{{ $OC }}">
                            <div class="form-horizontal">Código OC:</label>  {{ $OC }}

                                <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                                    <label for="nome" class="col-md-2 control-label">*Descrição:</label>

                                    <div class="col-md-8">
                                        <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" placeholder="Manta preta/ Tinta" maxlength="255" pattern="[a-zA-Z0-9\s]+$" data-toggle="tooltip" data-placement="top" title="Esse campo aceita somente caracteres minúsculo/MAIÚSCULOS" required autofocus>

                                        @if ($errors->has('nome'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('quantidade') ? ' has-error' : '' }}">
                                    <label for="quantidade" class="col-md-2 control-label">*Quantidade:</label>

                                    <div class="col-md-8">
                                        <input id="quantidade" type="text" class="form-control" name="quantidade" value="{{ old('quantidade') }}" placeholder="Ex: 1 (Rolo)/10 (Latas)" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9" required autofocus>

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

                                <div class="form-group{{ $errors->has('precoUnit') ? ' has-error' : '' }}">
                                    <label for="precoUnit" class="col-md-2 control-label">Preço Unitário:</label>

                                    <div class="col-md-8">
                                        <input id="precoUnit" type="text" class="form-control" name="precoUnit" value="{{ old('precoUnit') }}" placeholder="Ex: R$ 10.00/ R$270.55" data-toggle="tooltip" data-placement="top" title="Esse campo so aceita números de 0 a 9 separado por ponto" required autofocus>

                                        @if ($errors->has('precoUnit'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('precoUnit') }}</strong>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="idFornecedor" class="col-md-2 control-label">Fornecedor:</label>
                                    <div class="col-md-8" name="idFornecedor">
                                        <select name="idFornecedor" class="form-control form-control-lg">
                                            @foreach($fornecedores as $fornecedor)

                                                <option value={{ $fornecedor->idFornecedor }} class="dropdown-item">{{ $fornecedor->nome }}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cor_idCor" class="col-md-2 control-label">Cor:</label>
                                    <div class="col-md-8" name="cor_idCor">
                                        <select name="cor_idCor" class="form-control form-control-lg">
                                            @foreach($cors as $cor)

                                                <option value="{{ $cor->idCor }}" class="dropdown-item">{{ $cor->nome }}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="idTipoManta" class="col-md-2 control-label">*Tipo Manta:</label>
                                    <div class="col-md-8" name="idTipoManta">
                                        <select name="idTipoManta" class="form-control form-control-lg">
                                            @foreach($mantas as $manta)

                                                <option value="{{ $manta->idTipoManta }}" class="dropdown-item">{{ $manta->nome }}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="idTipoMaterial" class="col-md-2 control-label">*Tipo Material:</label>
                                    <div class="col-md-8" name="idTipoMaterial">
                                        <select name="idTipoMaterial" class="form-control form-control-lg">
                                            @foreach($materials as $material)

                                                <option value="{{ $material->idTipoMaterial }}" class="dropdown-item">{{ $material->nome }}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <br />

                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-2">
                                        <button type="submit" name="submit" value="0" class="btn btn-primary">
                                            Cadastrar Novo Insumo
                                        </button>

                                        <button type="submit" name="submit" value="1" class="btn btn-success">
                                            Cadastrar & Finalizar!
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
