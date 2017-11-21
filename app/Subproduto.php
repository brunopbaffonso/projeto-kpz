<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subproduto extends Model
{
    protected $primaryKey = 'idSubproduto';

    protected $fillable = [
        'idSubproduto','unidadeMedida', 'tipo', 'quantidade', 'comprimento', 'largura', 'created_at', 'updated_at', 'cor_idCor',
    ];

    public $timestamps = true;

    protected $table = 'subproduto';
}
