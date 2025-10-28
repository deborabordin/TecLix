<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campanha extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'detalhes',
        'local',
        'imagem',
        'ativa',
    ];

        public function participantes()
    {
        // 'users' é o nome da tabela de usuários, 'campanha_user' a tabela pivot
        return $this->belongsToMany(User::class, 'campanha_user', 'campanha_id', 'user_id');
    }
}
