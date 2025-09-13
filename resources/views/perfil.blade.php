@extends('layout.app')

@section('title', 'Perfil do Usuário')

@section('conteudo')
<div class="perfil-container">

    {{-- LADO ESQUERDO --}}
    <div class="perfil-esquerdo">
        <h2>Usuário</h2>

        <div class="perfil-info">
            <label>Email</label>
            <div class="input-fake">{{ $usuario->email ?? 'email@exemplo.com' }}</div>

            <label>CPF</label>
            <div class="input-fake">{{ $usuario->cpf ?? '000.000.000-00' }}</div>

            <label>Data de nascimento</label>
            <div class="input-fake">{{ $usuario->data_nascimento ?? '00/00/0000' }}</div>

            <label>Data de Entrada</label>
            <div class="input-fake">
                {{ $usuario && $usuario->created_at ? $usuario->created_at->format('d/m/Y') : 'XX / XX / XXXX' }}
            </div>
        </div>
    </div>

    {{-- LADO DIREITO --}}
    <div class="perfil-direito">

        {{-- Evolução --}}
        <div class="evolucao-box">
            <h3>Sua Evolução no Descarte</h3>
            <p class="pontuacao">Pontos</p>
            @php
                $pontos = 120; // <- simulação (substitua pelo valor real do usuário depois)
                $meta = 200;
                $porcentagem = min(100, intval(($pontos / $meta) * 100));
            @endphp
            <h2>{{ $pontos }}</h2>
            <p class="meta">Certificados a partir de {{ $meta }} pontos</p>

            <div class="barra-progresso">
                <div class="progresso" style="width: {{ $porcentagem }}%;"></div>
            </div>

            <p class="faltam">
                Faltam {{ max(0, $meta - $pontos) }} pontos para o seu certificado
            </p>

            {{-- BOTÃO: Gera certificado se tiver 200 pontos --}}
            <a href="{{ route('site.certificado') }}"
               class="btn-certificado {{ $pontos < $meta ? 'disabled' : '' }}"
               {{ $pontos < $meta ? 'onclick=event.preventDefault()' : '' }}>
                Gerar Certificado
            </a>
        </div>

        {{-- Histórico de descarte --}}
        <div class="historico-box">
            <h3>Seu Histórico de Descarte</h3>
            <a href="{{ route('comprovantes.create') }}" class="btn-descarte">COMPROVAR NOVO DESCARTE</a>
            <p class="info-text">
                Envie uma foto, vídeo ou recibo do seu descarte. <br>
                Seus pontos serão validados pela nossa equipe em até 3 dias úteis.
            </p>
        </div>

    </div>
</div>
@endsection

@push('css')
<style>
    .perfil-container {
        display: flex;
        gap: 30px;
        padding: 30px;
        font-family: Arial, sans-serif;
    }

    .perfil-esquerdo {
        width: 250px;
        background-color: #f4f4f4;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
    }

    .perfil-info {
        text-align: left;
        margin-top: 20px;
    }

    .perfil-info label {
        font-weight: bold;
        font-size: 14px;
        display: block;
        margin-top: 10px;
    }

    .input-fake {
        background-color: white;
        border: 1px solid #ccc;
        padding: 8px;
        border-radius: 5px;
        font-size: 14px;
        margin-top: 4px;
    }

    .perfil-direito {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    .evolucao-box,
    .historico-box {
        background-color: #f4f4f4;
        padding: 20px;
        border-radius: 10px;
    }

    .evolucao-box h3,
    .historico-box h3 {
        margin-bottom: 15px;
        font-size: 18px;
    }

    .pontuacao {
        font-weight: bold;
        margin: 0;
    }

    .meta {
        color: #666;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .barra-progresso {
        background-color: #ddd;
        border-radius: 5px;
        height: 20px;
        width: 100%;
        overflow: hidden;
        margin-bottom: 10px;
    }

    .progresso {
        background-color: #00b300;
        height: 100%;
    }

    .faltam {
        font-size: 14px;
        margin-bottom: 10px;
    }

    .btn-certificado {
        background-color: #00b300;
        color: white;
        padding: 8px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }

    .btn-certificado.disabled {
        background-color: #aaa;
        pointer-events: none;
        cursor: not-allowed;
    }

    .btn-descarte {
        display: inline-block;
        background-color: #00b300;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: bold;
        margin-bottom: 10px;
        text-decoration: none;
    }

    .info-text {
        font-size: 14px;
        color: #555;
    }
</style>
@endpush
