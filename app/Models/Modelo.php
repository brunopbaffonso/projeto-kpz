<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table = 'modelo'; //relação com a tabela do banco
    protected $primaryKey = 'idModelo';
    public $timestamps = false; //toda vez que for tirado o timestamps da migrate, grava a hora que foi alterado o banco
    protected $fillable = ['idModelo', 'nome']; //informações inseridas no banco


    public function item(){
        return $this->hasMany(Item::class);
    }
}
