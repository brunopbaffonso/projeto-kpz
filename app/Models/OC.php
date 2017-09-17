<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OC extends Model
{

    protected $table = 'oc';
    public $timestamps = true;
    protected $fillable = ['tipo', 'observacoes'];

    public function usuario(){
        return  $this->belongsTo(Usuario::class);

    }

    public function insumo(){
        return  $this->hasMany(Insumo::class);

    }
}
