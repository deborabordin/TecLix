@extends('layout.app')

@section('conteudo')
    <h1>Criar Ponto de Coleta</h1>

    <form action="{{ route('ponto-de-coletas.store') }}" method="POST">
        @csrf

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="{{ old('nome') }}">
        @error('nome') <p>{{ $message }}</p> @enderror

        <br>

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" id="endereco" value="{{ old('endereco') }}">
        @error('endereco') <p>{{ $message }}</p> @enderror

        <br>

        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" id="cidade" value="{{ old('cidade') }}">
        @error('cidade') <p>{{ $message }}</p> @enderror

        <br>

        <button type="submit">Salvar</button>
        <a href="{{ route('ponto-de-coletas.index') }}">Cancelar</a>
    </form>
@endsection
