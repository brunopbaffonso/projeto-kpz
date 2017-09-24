<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subproduto extends Model
{
    protected $primaryKey = 'idSubproduto';

    protected $fillable = [
        'idSubproduto', 'tipo', 'quantidade', 'comprimento', 'largura', 'created_at', 'updated_at', 'cor_idCor',
    ];

    protected $table = 'subproduto';
}
