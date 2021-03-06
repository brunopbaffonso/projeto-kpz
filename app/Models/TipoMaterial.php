<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoMaterial extends Model
{

    protected $table = 'tipoMaterial';
    protected $primaryKey = 'idTipoMaterial';
    public $timestamps = false;
    protected $fillable = ['idTipoMaterial', 'nome', 'precoMaterial', 'unidadeMedida'];

    public function insumo(){
        return  $this->hasMany(Insumo::class);

    }

    public function item(){
        return  $this->hasMany(Item::class);

    }

    public function cor(){
        return  $this->belongsTo(Cor::class);

    }
}
