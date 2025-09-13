<?php

use App\Models\Usuario;


class PerfilController extends Controller
{
    public function index()
    {
        // Simulando um usuário qualquer (usuário com id 1)
        $usuario = Usuario::find(1); // substitua depois com Auth

        return view('perfil', compact('usuario'));
    }
}
