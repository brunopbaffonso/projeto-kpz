<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{

    protected $table = 'fornecedor';
    public $timestamps = true;
    protected $fillable = ['ativo', 'nome', 'cnpj', 'cpf', 'ie', 'endereco', 'bairro', 'cep', 'fone', 'celular', 'email'];

    public function cidade(){
        return  $this->belongsTo(Cidade::class);

    }

    public function insumo(){
        return  $this->hasMany(Insumo::class);

    }
}
