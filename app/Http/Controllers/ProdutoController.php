<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\PontoDeColeta;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'pontuacao' => 'required|numeric',
        ]);

        Produto::create($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    public function show(PontoDeColeta $pontoDeColeta)
    {
        $produtosDisponiveis = Produto::whereNotIn('id', $pontoDeColeta->produtos->pluck('id'))->get();

        return view('ponto-de-coletas.show', compact('pontoDeColeta', 'produtosDisponiveis'));
    }

    public function addProduto(Request $request, PontoDeColeta $pontoDeColeta)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
        ]);

        $pontoDeColeta->produtos()->attach($request->produto_id);

        return redirect()->route('ponto-de-coletas.show', $pontoDeColeta);
    }




    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required',
            'pontuacao' => 'required|numeric',
        ]);

        $produto->update($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')->with('success', 'Produto deletado com sucesso!');
    }
}
