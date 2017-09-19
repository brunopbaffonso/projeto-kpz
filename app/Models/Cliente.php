<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    public $timestamps = true;
    protected $fillable = ['ativo', 'nome', 'cnpj', 'cpf', 'ie', 'endereco', 'bairro', 'cep', 'fone', 'celular', 'email'];

    public function os(){
        return  $this->hasMany(OS::class);

    }

    public function cidade(){
        return  $this->belongsTo(Cidade::class);

    }
}

