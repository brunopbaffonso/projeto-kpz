<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $primaryKey = 'idInsumo';

    protected $fillable = [
        'idInsumo', 'nome', 'quantidade', 'comprimento', 'largura', 'unidadeMedida', 'precoUnit', 'created_at', 'updated_at', 'oc_idOC', 'usuario_cpf', 'cor_idCor', 'fornecedor_idFornecedor', 'tipoManta_idTipoManta', 'tipoMaterial_idTipoMaterial',
];

    protected $table = 'insumo';

    public $timestamps = true;
}
