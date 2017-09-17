<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{

    protected $table = 'insumo';
    public $timestamps = true;
    protected $fillable = ['quantidade', 'comprimento', 'largura', 'unidadeMedida', 'precoUnit'];

    public function usuario(){
        return  $this->belongsTo(Usuario::class);

    }

    public function fornecedor(){
        return  $this->belongsTo(Fornecedor::class);

    }

    public function oc(){
        return  $this->belongsTo(OC::class);

    }

    public function tipomanta(){
        return  $this->belongsTo(TipoManta::class);

    }

    public function cor(){
        return  $this->belongsTo(Cor::class);

    }

    public function tipomaterial(){
        return  $this->belongsTo(TipoMaterial::class);

    }

}