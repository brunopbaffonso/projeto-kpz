<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoManta extends Model
{
    protected $table = 'tipoManta';
    public $timestamps = false;
    protected $fillable = ['nome', 'precoManta', 'unidadeMedida'];

    public function insumo(){
        return  $this->hasMany(Insumo::class);

    }

    public function cor(){
        return  $this->belongsTo(Cor::class);

    }

    public function item(){
        return  $this->hasMany(Item::class);

    }
}
