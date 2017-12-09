<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item'; //relação com a tabela do banco
    protected $primaryKey = 'idItem';
    public $timestamps = true; //toda vez que for tirado o timestamps da migrate, grava a hora que foi alterado o banco
    protected $fillable = ['quantidade','largura','comprimento','unidadeMedida','borda','arte','precoUnit']; //informações inseridas no banco


    public function os(){
        return $this->belongsTo(OS::class, 'os_idOS');
    }

    public function subproduto(){
        return  $this->belongsTo(Subproduto::class);
    }

    public function tipomanta(){
        return $this->belongsTo(TipoManta::class);
    }

    public function tipomaterial(){
        return  $this->belongsTo(TipoMaterial::class);
    }

    public function borda(){
        return $this->belongsTo(Borda::class);
    }

    public function modelo(){
        return $this->belongsTo(Modelo::class);
    }


}

