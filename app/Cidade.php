<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $fillable = [
        'idCidade', 'nome', 'estado_uf',
    ];

    protected $table = 'cidade';
}
