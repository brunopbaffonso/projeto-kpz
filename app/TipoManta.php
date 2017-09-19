<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoManta extends Model
{
    protected $fillable = [
        'idTipoManta', 'nome', 'precoManta', 'unidadeMedida', 'cor_idCor',
    ];

    protected $table = 'tipoManta';
}
