<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subproduto extends Model
{

    protected $table = 'subproduto';
    public $timestamps = true;
    protected $fillable = ['tipo', 'quantidade', 'largura', 'comprimento'];

    public function item(){
        return  $this->hasMany(Item::class);

    }

    public function cor(){
        return  $this->belongsTo(Cor::class);

    }

}
