<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OS extends Model
{

    protected $table = 'os';
    protected $primaryKey = 'idOS';
    public $timestamps = true;
    protected $fillable = ['idOS', 'tipo', 'observacoes'];

    public function usuario(){
        return  $this->belongsTo(Usuario::class);

    }

    public function cliente(){
        return  $this->belongsTo(Cliente::class);

    }

    public function item(){
        return  $this->hasMany(Item::class);

    }

}

