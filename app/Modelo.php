<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $primaryKey = 'idModelo';

    protected $fillable = [
        'idModelo', 'nome',
    ];

    protected $table = 'modelo';
}
