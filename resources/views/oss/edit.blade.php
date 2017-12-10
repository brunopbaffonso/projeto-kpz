@extends('layouts.padrao')

@section('content')
    <div id="page-wrapper">

        <div class="header">
            <h1 class="page-header">Adicionar Ordem de Serviço</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('oss') }}  ">Listar OS</a></li>
                <li class="active">Adicionar OS</li>
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
                                {!!Form::open(['url' => 'oss/'.$os->idOS, 'method' => 'put'])!!}


                                <div class="form-group row">
                                    <div class="col-md-8" name="cor_idCor">
                                        <label for="status" class="col-md-2 control-label">Status</label>
                                        <select name="status" class="form-control form-control-lg">
                                            @if($os->status == 'Aberta')
                                                <option value="Aberta" class="dropdown-item" selected>Aberta</option>
                                            @else
                                                <option value="Aberta" class="dropdown-item">Aberta</option>
                                            @endif
                                            @if($os->status == 'Executando')
                                                <option value="Executando" class="dropdown-item" selected>Executando</option>
                                            @else
                                                <option value="Executando" class="dropdown-item">Executando</option>
                                            @endif
                                            @if($os->status == 'Concluida')
                                                <option value="Concluida" class="dropdown-item" selected>Concluida</option>
                                            @else
                                                <option value="Concluida" class="dropdown-item">Concluida</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="idCliente" class="col-md-2 control-label">*Cliente:</label>
                                    <div class="col-md-8" name="idCliente">
                                        <select name="idCliente" class="form-control form-control-lg">
                                            @foreach($cliente as $c)
                                                @if($c->idCliente == $os->cliente_idCliente )
                                                    <option value="{{$c->idCliente}}" class="dropdown-item" selected>{{$c->nome}}</option>
                                                @else
                                                    <option value="{{$c->idCliente}}" class="dropdown-item">{{$c->nome}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('contato') ? ' has-error' : '' }}">
                                    <label for="contato" class="col-md-2 control-label">Contato:</label>

                                    <div class="col-md-8">
                                        <input id="contato" type="text" class="form-control" name="contato" value="{{ $os->contato }}" data-toggle="tooltip" data-placement="top" title="Tooltip on top" autofocus>

                                        @if ($errors->has('contato'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('contato') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('formaPgto') ? ' has-error' : '' }}">
                                    <label for="formaPgto" class="col-md-2 control-label">Forma de Pagamento:</label>

                                    <div class="col-md-8">
                                        <input id="formaPgto" type="text" class="form-control" name="formaPgto" value="{{ $os->formaPgto }}" data-toggle="tooltip" data-placement="top" title="Tooltip on top" required autofocus>

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
                                        <textarea id="observacoes" class="form-control" name="observacoes" value="{{ $os->observacoes }}" data-toggle="tooltip" data-placement="top" title="Tooltip on top" autofocus></textarea>

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
                                            Salvar Alterações!
                                        </button>
                                    </div>
                                </div>

 
                                {!! Form::close() !!}
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Quantidade</th>
                                        <th>Largura</th>
                                        <th>Comprimento</th>
                                        <th>Unidade de Medida</th>
                                        <th>Borda</th>
                                        <th>Preço Unitario</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($os->item as $item)
                                        <tr>
                                            <td>{{ $item->quantidade }}</td>
                                            <td>{{ $item->largura }}</td>
                                            <td>{{ $item->comprimento }}</td>
                                            <td>{{ $item->unidadeMedida }}</td>
                                            <td>{{ $item->borda }}</td>
                                            <td>{{ $item->precoUnit }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection