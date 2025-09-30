<?php

namespace App\Http\Controllers;

use App\Models\PontoDeColeta;
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
            'endereco' => 'required',
            'cidade' => 'required',
        ]);

        PontoDeColeta::create($validated);

        return redirect()->route('ponto-de-coletas.index');
    }

    public function show(PontoDeColeta $pontoDeColeta)
    {
        return view('ponto-de-coletas.show', compact('pontoDeColeta'));
    }

    // outros métodos como edit, update e destroy seguem o mesmo padrão

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PontoDeColeta $pontoDeColeta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PontoDeColeta $pontoDeColeta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PontoDeColeta $pontoDeColeta)
    {
        //
    }
}
