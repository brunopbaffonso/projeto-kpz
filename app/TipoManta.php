<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoManta extends Model
{
    protected $primaryKey = 'idTipoManta';

    protected $fillable = [
        'idTipoManta', 'nome', 'precoManta', 'unidadeMedida', 'cor_idCor',
    ];

    protected $table = 'tipoManta';
}
