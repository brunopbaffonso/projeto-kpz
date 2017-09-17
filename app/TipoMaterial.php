<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMaterial extends Model
{
    protected $fillable = [
        'idTipoMaterial', 'nome', 'precoMaterial', 'unidadeMedida', 'cor_idCor',
    ];

    protected $table = 'tipoMaterial';
}
