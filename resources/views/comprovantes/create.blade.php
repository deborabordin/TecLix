@extends('layout.app')

@section('title', 'Comprovante')

@section('conteudo')
<div class="comprovante-container">
    <h1>Enviar Comprovante</h1>

    <form action="{{ route('comprovantes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="foto">Foto do Comprovante</label>
        <input type="file" name="foto" id="foto" required>

        <label for="observacoes">Observações (opcional)</label>
        <textarea name="observacoes" id="observacoes" rows="4"></textarea>

        <button type="submit">Enviar</button>
    </form>
</div>
@endsection

@push('css')
<style>
    .comprovante-container {
        max-width: 500px;
        margin: 40px auto;
        padding: 30px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        font-family: Arial, sans-serif;
    }

    .comprovante-container h1 {
        text-align: center;
        margin-bottom: 25px;
        font-size: 24px;
    }

    form label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        margin-top: 15px;
    }

    form input[type="file"],
    form textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        margin-bottom: 10px;
    }

    form button {
        background-color: #00b300;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
        margin-top: 10px;
        transition: background-color 0.3s ease;
    }

    form button:hover {
        background-color: #009900;
    }
</style>
@endpush
