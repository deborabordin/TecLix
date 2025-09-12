<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificado; // Importa o modelo Certificado

class CertificadoController extends Controller
{
    public function mostrar()
    {
        // Retorna a view do formulário do certificado
        return view('certificado.form');
    }

    public function gerar(Request $request)
    {
        // Valida os dados enviados do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'campanha' => 'required|string|max:255',
        ]);

        $nome = $request->input('nome');
        $campanha = $request->input('campanha');
        $data = date('d/m/Y');

        // Retorna a view do certificado gerado, passando os dados
        return view('certificado.resultado', compact('nome', 'campanha', 'data'));
    }

    public function listar()
    {
        // Pega todos os certificados do banco
        $certificado = Certificado::all();

        return view('admin.certificado.index', compact('certificado'));
    }
}
