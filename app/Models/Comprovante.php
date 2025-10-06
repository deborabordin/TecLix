<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprovante extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'produto_id',
        'foto',
        'status',
        'observacoes',
    ];

    // relacionamento com o usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relacionamento com o produto
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    // relacionamento com ponto
    public function ponto()
    {
        return $this->hasOne(Ponto::class);
    }
}
