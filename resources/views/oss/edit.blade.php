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

                                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                    <label for="status" class="col-md-2 control-label">Status:</label>

                                    <div class="col-md-8">
                                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                            <label for="status" class="col-md-2 control-label">Status</label>
                                            <select name="status">
                                                <option value="Aberta" class="form-control">Aberta</option>
                                                <option value="Executando" class="form-control">Executando</option>
                                                <option value="Concluida" class="form-control">Concluida</option>
                                            </select>
                                        </div>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection