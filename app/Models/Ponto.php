<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ponto extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'comprovante_id',
        'quantidade',
    ];

    // Um ponto pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Um ponto pertence a um comprovante
    public function comprovante()
    {
        return $this->belongsTo(Comprovante::class);
    }
}
