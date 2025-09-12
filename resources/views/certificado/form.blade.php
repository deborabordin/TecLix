@extends('layout.app')

@section('title', 'Gerar Certificado')

@section('conteudo')
    <div class="page-header">
        <h1>Gerar Certificado</h1>
    </div>

    <main>
        <a href="{{ url()->previous() }}" class="back-btn">← Voltar</a>

        <div class="card">
            @if ($errors->any())
                <div style="color: red; margin-bottom: 15px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('certificado.gerar') }}">
                @csrf
                <label for="nome">Nome completo</label>
                <input id="nome" name="nome" type="text" placeholder="Seu nome completo" value="{{ old('nome') }}" required />

                <label for="campanha">Campanha</label>
                <select id="campanha" name="campanha" required>
                    <option value="">Selecione a campanha</option>
                    <option value="Campanha A" {{ old('campanha') == 'Campanha A' ? 'selected' : '' }}>Campanha A</option>
                    <option value="Campanha B" {{ old('campanha') == 'Campanha B' ? 'selected' : '' }}>Campanha B</option>
                    <option value="Campanha C" {{ old('campanha') == 'Campanha C' ? 'selected' : '' }}>Campanha C</option>
                </select>

                <button class="btn" type="submit">Gerar e imprimir</button>
            </form>
        </div>
    </main>
@endsection

@push('css')
    <style>
        body {
    font-family: 'Inter', sans-serif;
    margin: 0;
    background: #e4f7ecff;
    color: #111;
}



main {
    max-width: 600px;
    margin: 30px auto;
    padding: 20px;
}

.back-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #fff;
    color: #14532d;
    border: 2px solid #16a34a;
    padding: 8px 14px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: .2s;
}

.back-btn:hover {
    background: #16a34a;
    color: #fff;
}

.card {
    background: #fff;
    padding: 24px 32px;
    border-radius: 16px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
    margin-top: 20px;
}

label {
    display: block;
    margin: 16px 0 8px;
    font-weight: 700;
    font-size: 16px;
}

input,
select {
    width: 100%;
    padding: 12px 14px;
    border: 1.8px solid #d1e7db;
    border-radius: 12px;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

input:focus,
select:focus {
    border-color: #16a34a;
    outline: none;
}

.btn {
    background: #16a34a;
    border: none;
    color: #fff;
    padding: 14px 20px;
    margin-top: 28px;
    border-radius: 12px;
    font-weight: 700;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
    display: inline-block;
}

.btn:hover {
    background: #138d3a;
}

    </style>
@endpush
