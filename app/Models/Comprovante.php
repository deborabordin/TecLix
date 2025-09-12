<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprovante extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'foto',
        'status',
        'observacoes',
    ];

    // Um comprovante pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Um comprovante pode ter um ponto associado (se validado)
    public function ponto()
    {
        return $this->hasOne(Ponto::class);
    }
}
