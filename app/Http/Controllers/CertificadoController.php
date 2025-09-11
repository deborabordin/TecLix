<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CertificadoController extends Controller
{
    public function mostrar()
    {
        // Retorna a view do formulário do certificado
        return view('certificado.form');  // Ou o nome da sua view correta
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

    // app/Http/Controllers/CertificadoController.php

    public function listar()
    {
    // Pegue todos os certificados do banco (depois vamos criar esse modelo)
    $certificados = \App\Models\Certificado::all();

    return view('admin.certificados.index', compact('certificados'));
    }

}
