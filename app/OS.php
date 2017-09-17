<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OS extends Model
{
    protected $fillable = [
        'idOS', 'precoTotal', 'desconto', 'formaPgto', 'observacoes', 'observacoes', 'created_at', 'updated_at', 'usuario_cpf', 'cliente_idCliente',
    ];

    protected $table = 'os';
}
