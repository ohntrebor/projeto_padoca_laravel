<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_email',
        'apelido',
        'cep',
        'endereco',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'produtos',
        'subtotal',
        'total',
        'frete',
        'cupom',
        'obs',
        'status',
        'pagamento'
    ];
}
