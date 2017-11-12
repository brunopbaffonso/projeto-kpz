<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OC extends Model
{
    protected $primaryKey = 'idOC';

    protected $fillable = [
        'idOC', 'tipo', 'data', 'observacoes', 'created_at', 'updated_at', 'usuario_cpf',
    ];

    protected $table = 'oc';

    public $timestamps = true;
}
