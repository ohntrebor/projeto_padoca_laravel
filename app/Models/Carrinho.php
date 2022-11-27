<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    use HasFactory;


    protected $fillable = ['id_produto', 'user_email', 'quantidade', 'cupom'];

    // public function findIdProduto($query){
    //     $query->find('id_produto');
    // }

}
