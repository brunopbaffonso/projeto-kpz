<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cor extends Model
{
    protected $primaryKey = 'idCor';

    protected $fillable = [
        'idCor', 'nome',
    ];

    protected $table = 'cor';
}
