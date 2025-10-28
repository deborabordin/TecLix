<?php

namespace App\Http\Controllers;

use App\Models\Campanha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\User;


class CampanhaController extends Controller
{
    public function index()
    {
        $campanhas = Campanha::all();
        return view('admin.campanhas.index', compact('campanhas'));
    }

    public function create()
    {
        return view('admin.campanhas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'imagem'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'titulo'    => 'required|string|max:255',
            'descricao' => 'required|string',
            'detalhes'  => 'required|string',
            'local'     => 'required|string|max:255',
            'ativa'
        ]);

        $data = $request->all();

        // Checkbox
        $data['ativa'] = $request->has('ativa');

        // Upload da imagem
        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('campanhas', 'public');
            $data['imagem'] = $path;
        }

        Campanha::create($data);

        return redirect('admin/campanhas')
               ->with('success', 'Campanha criada com sucesso.');
    }

    public function show(Campanha $campanha)
    {
        return view('admin.campanhas.show', compact('campanha'));
    }

    public function edit(Campanha $campanha)
    {
        return view('admin.campanhas.edit', compact('campanha'));
    }

    public function update(Request $request, Campanha $campanha)
    {
        $request->validate([
            'imagem'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'titulo'    => 'required|string|max:255',
            'descricao' => 'required|string',
            'detalhes'  => 'required|string',
            'local'     => 'required|string|max:255',
            'ativa'
        ]);

        $data = $request->all();
        $data['ativa'] = $request->has('ativa');

        // Substitui imagem se enviada
        if ($request->hasFile('imagem')) {
            if ($campanha->imagem && Storage::disk('public')->exists($campanha->imagem)) {
                Storage::disk('public')->delete($campanha->imagem);
            }

            $path = $request->file('imagem')->store('campanhas', 'public');
            $data['imagem'] = $path;
        }

        $campanha->update($data);

        return redirect('/admin/campanhas')
               ->with('success', 'Campanha atualizada com sucesso.');
    }

    public function destroy(Campanha $campanha)
    {
        if ($campanha->imagem && Storage::disk('public')->exists($campanha->imagem)) {
            Storage::disk('public')->delete($campanha->imagem);
        }

        $campanha->delete();

        return redirect()->route('campanhas.index')
               ->with('success', 'Campanha deletada com sucesso.');
    }

public function mostrarParticipantes($id)
{
    $campanha = Campanha::findOrFail($id);
    $participantes = $campanha->participantes; // Isso funciona pois o relacionamento está no model

    return view('campanha.participantes', compact('campanha', 'participantes'));
}

public function participar(Request $request, Campanha $campanha)
{
$user = Auth::user();


    // Verifica se já está participando
    if ($campanha->participantes()->where('user_id', $user->id)->exists()) {
        return response()->json(['message' => 'Você já está participando desta campanha.'], 400);
    }

    $campanha->participantes()->attach($user->id);

    return response()->json(['message' => "Você está participando da campanha: {$campanha->titulo}"]);
}

}
