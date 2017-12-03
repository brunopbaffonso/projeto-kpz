<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'idCliente';
    public $timestamps = true;
    protected $fillable = ['idCliente', 'ativo', 'nome', 'cnpj', 'cpf', 'ie', 'endereco', 'bairro', 'cep', 'fone', 'celular', 'email', 'created_at', 'updated_at', 'cidade_idCidade'];

    public function os(){
        return  $this->hasMany(OS::class);

    }

    public function cidade(){
        return  $this->belongsTo(Cidade::class, 'cidade_idCidade', 'nome');

    }
}

