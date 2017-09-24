<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoManta extends Model
{
    protected $table = 'tipoManta';
    protected $primaryKey = 'idTipoManta';
    public $timestamps = false;
    protected $fillable = ['idTipoManta', 'nome', 'precoManta', 'unidadeMedida'];

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
