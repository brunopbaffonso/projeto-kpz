@extends('layouts.padrao')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Usuário</div>

                    <div class="panel-body">
                    <!-- <form class="form-horizontal" method="POST" action="{{ /* route('register') */ }}"> -->

                        {!!Form::open(['url' => 'usuarios/'.$usuario->cpf, 'method' => 'put'])!!}

                        <input id="ativo" type="hidden" class="form-control" name="ativo" value="1">

                        <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                            <label for="cpf" class="col-md-2 control-label">CPF</label>

                            <div class="col-md-8">
                                <input id="cpf" type="text" class="form-control" name="cpf" value="{{ $usuario->cpf }}" pattern="[0-9]+$"  maxlength="14" placeholder="00000000000" data-toggle="tooltip" data-placement="top" title="Esse campo só aceita números de 0 a 9"" required autofocus>

                                @if ($errors->has('cpf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                            <label for="nome" class="col-md-2 control-label">Nome</label>

                            <div class="col-md-8">
                                <input id="nome" type="text" class="form-control" name="nome" value="{{ $usuario->nome }}" placeholder="João da Silva" maxlength="255" pattern="[a-zA-Z\s]+$" data-toggle="tooltip" data-placement="top" title="Esse campo aceita somente caracteres minúsculo/MAIÚSCULOS" required autofocus>

                                @if ($errors->has('nome'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fone') ? ' has-error' : '' }}">
                            <label for="fone" class="col-md-2 control-label">Telefone</label>

                            <div class="col-md-8">
                                <input id="fone" type="text" class="form-control" name="fone" value="{{ $usuario->fone }}" placeholder="(00)00000000" maxlength="12" pattern="[0-9]+$" data-toggle="tooltip" data-placement="top" title="Esse campo só aceita números de 0 a 9" autofocus>

                                @if ($errors->has('fone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
                            <label for="celular" class="col-md-2 control-label">Celular</label>

                            <div class="col-md-8">
                                <input id="celular" type="text" class="form-control" name="celular" value="{{ $usuario->celular }}" dplaceholder="(00)900000000" maxlength="13" pattern="[0-9]+$" data-toggle="tooltip" data-placement="top" title="Esse campo só aceita números de 0 a 9" autofocus>

                                @if ($errors->has('celular'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('celular') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-2 control-label">E-Mail</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $usuario->email }}" data-toggle="tooltip" data-placement="top" title="Tooltip on top" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-2 control-label">Senha</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control" name="password" value="{{ $usuario->password }}" data-toggle="tooltip" data-placement="top" title="Esse campo aceita somente caracteres minúsculo/MAIÚSCULOS e caracteres especiais. Obrigatório o uso de @!" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required autofocus>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
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
