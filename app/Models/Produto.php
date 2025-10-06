<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'pontuacao'];

    public function pontosDeColeta()
    {
        return $this->belongsToMany(PontoDeColeta::class);
    }

    public function comprovantes()
{
    return $this->hasMany(Comprovante::class);
}

}
