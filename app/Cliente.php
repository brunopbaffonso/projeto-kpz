<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $primaryKey = 'idCliente';
    protected $fillable = [
        'idCliente', 'ativo', 'nome', 'cnpj', 'cpf', 'ie', 'endereco', 'bairro', 'cep', 'fone', 'celular', 'email', 'created_at', 'updated_at', 'cidade_idCidade',
    ];

    protected $table = 'cliente';

    public $timestamps = true;
}
