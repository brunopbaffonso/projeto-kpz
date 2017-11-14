<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuario';
    protected $primaryKey = 'cpf';
    public $timestamps = true;
    protected $fillable = ['cpf', 'tipoAcesso', 'nome', 'fone', 'celular', 'email', ' ativo', 'password'];
    protected  $hidden = ['created_at', 'updated_at', 'remember_token'];

    public function os(){
        return  $this->hasMany(OS::class);

    }

    public function oc(){
        return  $this->hasMany(OC::class);

    }

    public function insumo(){
        return  $this->hasMany(Insumo::class);

    }

    public function getCpfAttribute($cpf){
        if(strlen($cpf)<11){
            return str_pad($cpf, 3, "0", STR_PAD_LEFT);
        }
        else return $cpf;
    }

}