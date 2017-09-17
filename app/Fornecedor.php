<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $fillable = [
        'idFornecedor', 'ativo', 'nome', 'cnpj', 'ie', 'endereco', 'bairro', 'cep', 'fone', 'celular', 'email', 'created_at', 'updated_at', 'cidade_idCidade',
    ];

    protected $table = 'fornecedor';
}
