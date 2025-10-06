<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function create()
    {

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => ['required', Password::min(6)]
        ]);

        $user = new User($validated);
        $user->role = 'usuario';

        $user->save();

        return redirect()->route('login');
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function perfil()
    {
        // pega o usuário logado
        $usuario = auth()->user();

        // soma total de pontos do usuário (pode ser 0)
        $pontos = \App\Models\Ponto::where('user_id', $usuario->id)->sum('quantidade');

        // meta e progresso
        $meta = 200;
        $porcentagem = $meta > 0 ? min(100, intval(($pontos / $meta) * 100)) : 0;

        // envia tudo pra view
        return view('perfil', compact('usuario', 'pontos', 'meta', 'porcentagem'));
    }



}

