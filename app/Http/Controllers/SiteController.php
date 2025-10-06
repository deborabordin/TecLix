<?php

namespace App\Http\Controllers;

use App\Models\User;


use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function coletas()
    {
        return view ( 'coletas');
    }

    public function campanhas()
    {
        return view ( 'campanhas');
    }

    public function certificado()
    {
        return view ( 'certificado');
    }

    public function perfil()
    {
        $usuario = auth()->user();

        $pontos = \App\Models\Ponto::where('user_id', $usuario->id)->sum('quantidade');

        $meta = 200;
        $porcentagem = $meta > 0 ? min(100, intval(($pontos / $meta) * 100)) : 0;

        return view('perfil', compact('usuario', 'pontos', 'meta', 'porcentagem'));
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


