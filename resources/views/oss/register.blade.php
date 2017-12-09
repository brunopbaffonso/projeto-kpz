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
                                {!!Form::open(['url' => 'oss/', 'method' => 'post'])!!}

                                <input id="status" type="hidden" class="form-control" name="status" value="Aberta">


                                <div class="form-group{{ $errors->has('contato') ? ' has-error' : '' }}">
                                    <label for="contato" class="col-md-2 control-label">Contato</label>

                                    <div class="col-md-8">
                                        <input id="contato" type="text" class="form-control" name="contato" value="{{ old('contato') }}" data-toggle="tooltip" data-placement="top" title="Tooltip on top" required autofocus>

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
                                        <input id="formaPgto" type="text" class="form-control" name="formaPgto" value="{{ old('formaPgto') }}" data-toggle="tooltip" data-placement="top" title="Tooltip on top" required autofocus>

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
                                        <textarea id="observacoes" class="form-control" name="observacoes" value="{{ old('observacoes') }}" data-toggle="tooltip" data-placement="top" title="Tooltip on top" autofocus ></textarea>

                                        @if ($errors->has('observacoes'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('observacoes') }}</strong>
                                    </span>
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

                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-2">
                                        <button type="submit" class="btn btn-primary">
                                            Cadastrar!
                                        </button>

                                        <button type="button" id="novoItem" class="btn btn-primary">
                                            Novo Item
                                        </button>
                                    </div>
                                </div>
                                {!! Form::close() !!}

                            <div id="item">
                                <li>text</li>
                            </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            $('#novoItem').on('click', function() {

                var para = document.createElement("p");
                var node = document.createTextNode("Novo Item");
                para.appendChild(node);

                var element = document.getElementById("item");
                element.appendChild(para);
            });
        </script>
    @endpush
@endsection
