<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PontoDeColeta extends Model
{
    protected $fillable = ['nome', 'numero', 'bairro', 'cidade', 'rua'];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class);
    }

}
