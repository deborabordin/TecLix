<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Certificado; // Importa o modelo Certificado




class CertificadoController extends Controller
{
    public function mostrar()
    {
        // Retorna a view do formulário do certificado
        return view('certificado.form');
    }

    public function gerar()
    {
    /** @var \App\Models\User $user */
$user = Auth::user();


        // Pega todos os comprovantes aprovados com pontos (ajuste se necessário)
        $comprovantes = $user->comprovantes()->with(['produto', 'ponto'])->get();

        // Soma total de pontos do usuário
        $totalPontos = $comprovantes->sum(function ($comprovante) {
            return optional($comprovante->ponto)->quantidade ?? 0;
        });

        // ⚠️ Verifica se atingiu os 200 pontos mínimos
        if ($totalPontos < 200) {
            return redirect()->back()->with('error', 'Você precisa de no mínimo 200 pontos para gerar o certificado.');
        }

        // Nome do usuário
        $nome = $user->name;
        $data = date('d/m/Y');

        // Agrupar os lixos descartados
        $lixos = $comprovantes->groupBy('produto.nome')->map(function ($group) {
            return $group->count();
        });

        // Campanha pode ser fixa ou dinâmica
        $campanha = 'Campanha de Reciclagem Sustentável 2025';

        return view('certificado.resultado', compact('nome', 'data', 'totalPontos', 'lixos', 'campanha'));
    }


    public function listar()
    {
        // Pega todos os certificados do banco
        $certificado = Certificado::all();

        return view('admin.certificado.index', compact('certificado'));
    }
}
