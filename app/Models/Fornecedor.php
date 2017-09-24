<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{

    protected $table = 'fornecedor';
    protected $primaryKey = 'idFornecedor';
    public $timestamps = true;
    protected $fillable = ['idFornecedor', 'ativo', 'nome', 'cnpj', 'cpf', 'ie', 'endereco', 'bairro', 'cep', 'fone', 'celular', 'email'];

    public function cidade(){
        return  $this->belongsTo(Cidade::class);

    }

    public function insumo(){
        return  $this->hasMany(Insumo::class);

    }
}
