<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estado';
    protected $primaryKey = 'uf';
    public $timestamps = false;
    protected $fillable = ['uf', 'nome'];

    public function cidade(){
        return  $this->hasMany(Cidade::class);

    }
}