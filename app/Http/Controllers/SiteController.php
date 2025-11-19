<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Campanha;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        $campanhas = Campanha::where('ativa', true)->get();
        return view('home', compact('campanhas'));
    }

    public function coletas()
    {
        return view ( 'coletas');
    }

    public function campanhas(Campanha $campanha)
    {
        return view('campanhas', compact('campanha'));
    }


    public function certificado()
    {
        return view ( 'certificado');
    }

    public function perfil()
    {
        $usuario = Auth::user();

        $pontos = \App\Models\Ponto::where('user_id', $usuario->id)->sum('quantidade');
        $meta = 200;
        $porcentagem = $meta > 0 ? min(100, intval(($pontos / $meta) * 100)) : 0;


        // campanhas anteriores vinculadas ao usuário (rel. belongsToMany no User)
        $campanhasAnteriores = $usuario->campanhas()->where('ativa', false)->get();

        $campanhasParticipadas = $usuario->campanhas;

        return view('perfil', compact(
            'usuario',
            'pontos',
            'meta',
            'porcentagem',
            'campanhasParticipadas',

            'campanhasAnteriores')
        );
    }


    public function login()
    {
        return view ( 'login');
    }

    public function descarte()
    {
        return view ( 'descarte');
    }

    public function cadastro()
    {
        return view ( 'cadastro');
    }
}


