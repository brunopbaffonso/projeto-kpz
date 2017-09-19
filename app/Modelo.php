<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $fillable = [
        'idModelo', 'nome',
    ];

    protected $table = 'modelo';
}
