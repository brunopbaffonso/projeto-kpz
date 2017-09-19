<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{

    protected $table = 'cidade';
    public $timestamps = false;
    protected $fillable = ['nome'];

    public function cliente(){
        return  $this->hasMany(Cliente::class);

    }

    public function fornecedor(){
        return  $this->hasMany(Fornecedor::class);

    }

    public function estado(){
        return  $this->belongsTo(Estado::class);

    }
}