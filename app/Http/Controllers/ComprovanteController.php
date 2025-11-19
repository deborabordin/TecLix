<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Comprovante;
use App\Models\Ponto;
use App\Models\Produto;

class ComprovanteController extends Controller
{
    // Mostrar todos os comprovantes do usuário autenticado
    public function index()
    {
        $user = auth()->user();

        $comprovantes = Comprovante::where('user_id', $user->id)->latest()->get();

        return view('comprovantes.index', compact('comprovantes'));
    }

    // Formulário para enviar um novo comprovante
    public function create()
    {
        $produtos = Produto::all();
        return view('comprovantes.create', compact('produtos'));
    }

    // Salvar comprovante enviado
    public function store(Request $request)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'foto' => 'required|image|max:2048',
        ]);

        $path = $request->file('foto')->store('comprovantes', 'public');

        Comprovante::create([
            'user_id' => auth()->id(),
            'produto_id' => $request->produto_id,
            'foto' => $path,
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
