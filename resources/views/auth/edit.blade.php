@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Usuário</div>

                    <div class="panel-body">
                    <!-- <form class="form-horizontal" method="POST" action="{{ route('register') }}"> -->

                        {!!Form::open(['url' => '/usuario/'.$usuario->cpf, 'method' => 'post'])!!}

                            <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                                <label for="cpf" class="col-md-4 control-label">CPF</label>

                                <div class="col-md-6">
                                    <input id="cpf" type="text" class="form-control" name="cpf" value="{{ $usuario->cpf }}" required autofocus>

                                    @if ($errors->has('cpf'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                                <label for="nome" class="col-md-4 control-label">Nome</label>

                                <div class="col-md-6">
                                    <input id="nome" type="text" class="form-control" name="nome" value="{{ $usuario->nome }}" required autofocus>

                                    @if ($errors->has('nome'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('fone') ? ' has-error' : '' }}">
                                <label for="fone" class="col-md-4 control-label">Telefone</label>

                                <div class="col-md-6">
                                    <input id="fone" type="text" class="form-control" name="fone" value="{{ $usuario->fone }}" autofocus>

                                    @if ($errors->has('fone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
                                <label for="celular" class="col-md-4 control-label">Celular</label>

                                <div class="col-md-6">
                                    <input id="celular" type="text" class="form-control" name="celular" value="{{ $usuario->celular }}" required autofocus>

                                    {{--@if ($errors->has('celular'))--}}
                                    {{--<span class="help-block">--}}
                                    {{--<strong>{{ $errors->first('celular') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $usuario->email }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="{{ $usuario->password }}" required autofocus>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
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
