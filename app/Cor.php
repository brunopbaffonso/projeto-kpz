<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cor extends Model
{
    protected $fillable = [
        'idCor', 'nome',
    ];

    protected $table = 'cor';
}
