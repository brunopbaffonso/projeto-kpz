<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'idItem', 'quantidade', 'largura', 'comprimento', 'unidadeMedida', 'borda', 'arte', 'precoUnit', 'fonte', 'created_at', 'updated_at', 'os_idOS', 'tipoManta_idTipoManta', 'tipoMaterial_idTipoMaterial', 'borda_idBorda', 'subproduto_idSubproduto', 'modelo_idModelo',
    ];

    protected $table = 'item';
}
