<?php

namespace App\Http\Controllers;
use App\Models\Usuario;


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
        $usuario = \App\Models\Usuario::find(1); // apenas simulação por enquanto
        return view('perfil', compact('usuario'));
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


