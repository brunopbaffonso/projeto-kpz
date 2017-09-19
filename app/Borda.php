<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borda extends Model
{
    protected $fillable = [
        'idBorda', 'nome', 'precoBorda', 'unidadeMedida', 'cor_idCor',
    ];

    protected $table = 'borda';
}
