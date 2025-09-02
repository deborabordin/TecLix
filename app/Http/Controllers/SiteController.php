<?php

namespace App\Http\Controllers;

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
        return view ( 'perfil');
    }

    public function login()
    {
        return view ( 'login');
    }

    public function descarte()
    {
        return view ( 'descarte');
    }
}


