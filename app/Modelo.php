<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $primaryKey = 'idModelo';

    protected $fillable = [
        'idModelo', 'nome', 'created_at', 'updated_at', 
    ];

    private $table = 'modelo';
}
