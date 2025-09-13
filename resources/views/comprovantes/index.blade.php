@extends('layout.app')

@section('title', 'Meus Comprovantes')

@section('conteudo')
<div class="comprovantes-container">
    <h1>Meus Comprovantes</h1>

    <a href="{{ route('site.home') }}" class="btn-voltar">Voltar</a>
    <a href="{{ route('comprovantes.create') }}" class="btn-enviar">Enviar novo comprovante</a>

    @if($comprovantes->isEmpty())
        <p>Você ainda não enviou nenhum comprovante.</p>
    @else
        <ul class="lista-comprovantes">
            @foreach ($comprovantes as $comprovante)
                <li class="item-comprovante">
                    <img src="{{ asset('storage/' . $comprovante->foto) }}" width="120" alt="Foto comprovante">
                    <div class="info">
                        <p><strong>Status:</strong> {{ ucfirst($comprovante->status) }}</p>
                        <p><strong>Observações:</strong> {{ $comprovante->observacoes ?? 'Nenhuma' }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection

@push('css')
<style>
    .comprovantes-container {
        max-width: 700px;
        margin: 40px auto;
        font-family: Arial, sans-serif;
        padding: 0 15px;
    }

    h1 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }

    .btn-voltar {
        display: inline-block;
        margin-bottom: 15px;
        background-color: #6c757d;
        color: white;
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        margin-right: 10px;
    }

    .btn-voltar:hover {
        background-color: #5a6268;
    }

    .btn-enviar {
        display: inline-block;
        margin-bottom: 20px;
        background-color: #007bff;
        color: white;
        padding: 10px 18px;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-enviar:hover {
        background-color: #0056b3;
    }

    .lista-comprovantes {
        list-style: none;
        padding: 0;
    }

    .item-comprovante {
        display: flex;
        align-items: center;
        background-color: #f9f9f9;
        margin-bottom: 15px;
        border-radius: 8px;
        box-shadow: 0 0 5px rgba(0,0,0,0.1);
        padding: 15px;
    }

    .item-comprovante img {
        border-radius: 6px;
        margin-right: 15px;
        object-fit: cover;
        height: 90px;
        width: 120px;
    }

    .info p {
        margin: 4px 0;
        color: #555;
    }

    .info strong {
        color: #222;
    }
</style>
@endpush
