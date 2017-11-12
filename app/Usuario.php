<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class Usuario extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $primaryKey = 'cpf';

    protected $fillable = [
        'cpf', 'ativo', 'tipoAceso', 'nome', 'fone', 'celular', 'email', 'password',
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'remember_token',
    ];

    public $timestamps = true;

    protected $table = 'usuario';
}
