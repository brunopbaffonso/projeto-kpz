<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $primaryKey = 'uf';

    protected $fillable = [
        'uf', 'nome',
    ];

    protected $table = 'estado';
}
