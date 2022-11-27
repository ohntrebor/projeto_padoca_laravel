<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['produto', 'peso', 'tipo_peso', 'valor', 'imagem'];

    public function isLiquido($query){
        $query->where('tipo_peso', 'ml');
    }

    public function isComestivel($query){
        $query->where('tipo_peso', 'g');
    }

    public function Carrinho(){
        return $this->hasOne('App\Carrinho');
    }
}
