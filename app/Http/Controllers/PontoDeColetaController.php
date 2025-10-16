<?php

namespace App\Http\Controllers;

use App\Models\PontoDeColeta;
use App\Models\Produto;
use Illuminate\Http\Request;

class PontoDeColetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pontoDeColetas = PontoDeColeta::all();
        return view('ponto-de-coletas.index', compact('pontoDeColetas'));
    }

    public function create()
    {
        return view('ponto-de-coletas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required',
            'bairro' => 'required',
            'rua' => 'required',
            'cidade' => 'required',
            'numero' => 'required',
        ]);

        PontoDeColeta::create($validated);

        return redirect()->route('ponto-de-coletas.index');
    }

    public function show(PontoDeColeta $pontoDeColeta)
    {
        $produtosDisponiveis = Produto::whereNotIn('id', $pontoDeColeta->produtos->pluck('id'))->get();

        return view('ponto-de-coletas.show', compact('pontoDeColeta', 'produtosDisponiveis'));
    }

    public function addProduto(PontoDeColeta $pontoDeColeta, Request $request)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id'
        ]);

        $produto = Produto::find($request->produto_id);

        $pontoDeColeta->produtos()->attach($produto);

        return redirect()->route('ponto-de-coletas.show', $pontoDeColeta->id);
    }

    // outros métodos como edit, update e destroy seguem o mesmo padrão

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PontoDeColeta $pontoDeColeta)
    {
        return view('ponto-de-coletas.edit', compact('pontoDeColeta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PontoDeColeta $pontoDeColeta)
    {
        $request->validate([
            'nome' => 'required',
            'bairro' => 'required',
            'rua' => 'required',
            'cidade' => 'required',
            'numero' => 'required',
        ]);

        $pontoDeColeta->update($request->all());

        return redirect()->route('ponto-de-coletas.index')->with('success', 'Ponto de Coleta atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PontoDeColeta $pontoDeColeta)
    {
        $pontoDeColeta->delete();

        return redirect()->route('ponto-de-coletas.index')->with('success', 'Ponto de Coleta deletado com sucesso!');
    }
}
