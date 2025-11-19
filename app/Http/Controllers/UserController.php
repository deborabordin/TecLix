<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use App\Models\Campanha;


class UserController extends Controller
{
    public function create()
    {

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => ['required', Password::min(6)]
        ], [
            'unique' => 'O email já está em uso'
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

        $usuario = Auth::user();

        // campanha ativa (se houver)
        $campanhaAtual = Campanha::where('ativa', true)->first();

        // campanhas anteriores vinculadas ao usuário (rel. belongsToMany no User)
        $campanhasAnteriores = $usuario->campanhas()->where('ativa', false)->get();

        // seus valores de pontos/meta/progresso (ajuste conforme sua lógica real)
        $pontos = $usuario->pontos ?? 0;
        $meta = 200;
        $porcentagem = $meta > 0 ? min(100, ($pontos / $meta) * 100) : 0;

        return view('perfil', compact(
            'usuario',
            'pontos',
            'meta',
            'porcentagem',
            'campanhaAtual',
            'campanhasAnteriores'
        ));

    }
}






