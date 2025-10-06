<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comprovante;
use Illuminate\Http\Request;

class ComprovanteAdminController extends Controller
{
    public function index()
    {
        $comprovantes = Comprovante::where('status', 'pendente')->with('user', 'produto')->get();
        return view('admin.comprovantes.index', compact('comprovantes'));
    }

    public function show(Comprovante $comprovante)
    {
        return view('admin.comprovantes.show', compact('comprovante'));
    }

    public function aprovar(Request $request, Comprovante $comprovante)
    {
        $comprovante->update([
            'status' => 'aprovado',
            'observacoes' => $request->observacoes
        ]);

        return redirect()->route('admin.comprovantes.index')->with('success', 'Comprovante aprovado!');
    }

    public function rejeitar(Request $request, Comprovante $comprovante)
    {
        $comprovante->update([
            'status' => 'rejeitado',
            'observacoes' => $request->observacoes
        ]);

        return redirect()->route('admin.comprovantes.index')->with('success', 'Comprovante rejeitado.');
    }
}
