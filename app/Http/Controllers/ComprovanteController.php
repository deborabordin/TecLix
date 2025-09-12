<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Comprovante;
use App\Models\Ponto;

class ComprovanteController extends Controller
{
    // Mostrar todos os comprovantes do usuário autenticado
    public function index()
    {
        $comprovantes = Comprovante::where('user_id', 1)->latest()->get();

        return view('comprovantes.index', compact('comprovantes'));
    }

    // Formulário para enviar um novo comprovante
    public function create()
    {
        return view('comprovantes.create');
    }

    // Salvar comprovante enviado
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|max:2048',
            'observacoes' => 'nullable|string',
        ]);

        $path = $request->file('foto')->store('comprovantes', 'public');

        Comprovante::create([
            'user_id' => 1,  // Ou outro ID fixo válido que exista na tabela users
            'foto' => $path,
            'observacoes' => $request->observacoes,
            'status' => 'pendente',
        ]);

        return redirect()->route('comprovantes.index')->with('success', 'Comprovante enviado com sucesso!');
    }

    // Aprovar ou rejeitar comprovante
    public function validar(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:aprovado,rejeitado',
            'pontos' => 'nullable|integer|min:0',
        ]);

        $comprovante = Comprovante::findOrFail($id);
        $comprovante->status = $request->status;
        $comprovante->save();

        // Se for aprovado e ainda não tem ponto, criar ponto
        if ($request->status === 'aprovado' && !$comprovante->ponto) {
            $pontos = $request->pontos ?? 10; // valor padrão: 10
            Ponto::create([
                'user_id' => $comprovante->user_id,
                'comprovante_id' => $comprovante->id,
                'quantidade' => $pontos,
            ]);
        }

        return back()->with('success', 'Comprovante validado com sucesso!');
    }
}
