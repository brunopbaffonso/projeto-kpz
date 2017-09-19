<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borda extends Model
{

    protected $table = 'borda';
    public $timestamps = false;
    protected $fillable = ['nome', 'precoBorda', 'unidadeMedida'];

    public function item(){
        return  $this->hasMany(Item::class);

    }

    public function cor(){
        return  $this->belongsTo(Cor::class);

    }
}

