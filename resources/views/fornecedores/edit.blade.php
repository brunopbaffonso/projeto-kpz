@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                    <!-- <form class="form-horizontal" method="POST" action="{{ route('register') }}"> -->

                        {!!Form::open(['url' => '/cliente/'.$cliente->idCliente, 'method' => 'post'])!!}

                        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                            <label for="nome" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" value="{{ $cliente->nome }}" required autofocus>

                                @if ($errors->has('nome'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cnpj') ? ' has-error' : '' }}">
                            <label for="cnpj" class="col-md-4 control-label">CNPJ</label>

                            <div class="col-md-6">
                                <input id="cnpj" type="text" class="form-control" name="cnpj" value="{{ $cliente->cnpj }}" required autofocus>

                                @if ($errors->has('cnpj'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cnpj') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ie') ? ' has-error' : '' }}">
                            <label for="ie" class="col-md-4 control-label">IE</label>

                            <div class="col-md-6">
                                <input id="ie" type="text" class="form-control" name="ie" value="{{ $cliente->ie }}" autofocus>

                                @if ($errors->has('ie'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ie') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('endereco') ? ' has-error' : '' }}">
                            <label for="endereco" class="col-md-4 control-label">Endereço</label>

                            <div class="col-md-6">
                                <input id="endereco" type="text" class="form-control"  value="{{ $cliente->endereco }}" name="endereco" required autofocus>

                                @if ($errors->has('endereco'))
                                    <span class="help-block">
                                        <strong>{{ $cliente->endereco }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bairro') ? ' has-error' : '' }}">
                            <label for="bairro" class="col-md-4 control-label">Bairro</label>

                            <div class="col-md-6">
                                <input id="bairro" type="text" class="form-control" value="{{ $cliente->bairro }}" name="bairro" required autofocus>

                                @if ($errors->has('bairro'))
                                    <span class="help-block">
                                        <strong>{{ $cliente->bairro }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cep') ? ' has-error' : '' }}">
                            <label for="cep" class="col-md-4 control-label">CEP</label>

                            <div class="col-md-6">
                                <input id="cep" type="text" class="form-control" value="{{ $cliente->cep }}" name="cep" autofocus>

                                @if ($errors->has('cep'))
                                    <span class="help-block">
                                        <strong>{{ $cliente->cep }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fone') ? ' has-error' : '' }}">
                            <label for="fone" class="col-md-4 control-label">Telefone</label>

                            <div class="col-md-6">
                                <input id="fone" type="text" class="form-control" value="{{ $cliente->fone }}" name="fone" autofocus>

                                @if ($errors->has('fone'))
                                    <span class="help-block">
                                        <strong>{{ $cliente->fone }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
                            <label for="celular" class="col-md-4 control-label">Celular</label>

                            <div class="col-md-6">
                                <input id="celular" type="text" class="form-control" name="celular" value="{{ $cliente->celular }}" required autofocus>

                                {{--@if ($errors->has('celular'))--}}
                                {{--<span class="help-block">--}}
                                {{--<strong>{{ $errors->first('celular') }}</strong>--}}
                                {{--</span>--}}
                                {{--@endif--}}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $cliente->email }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $cliente->email }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Salvar Alterações
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