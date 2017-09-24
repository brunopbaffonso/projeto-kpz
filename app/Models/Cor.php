<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cor extends Model
{

    protected $table = 'cor';
    protected $primaryKey = 'idCor';
    public $timestamps = false;
    protected $fillable = ['idCor', 'nome'];

    public function insumo(){
        return  $this->hasMany(Insumo::class);

    }

    public function tipomanta(){
        return  $this->hasMany(TipoManta::class);

    }

    public function tipomaterial(){
        return  $this->hasMany(TipoMaterial::class);

    }

    public function borda(){
        return  $this->hasMany(Borda::class);

    }

    public function subproduto(){
        return  $this->hasMany(Subproduto::class);

    }
}
