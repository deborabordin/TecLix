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
}
