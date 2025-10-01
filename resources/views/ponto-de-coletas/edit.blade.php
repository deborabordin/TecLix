@extends('layout.app')

@section('conteudo')
    <h1>Editar Ponto de Coleta</h1>

    <form action="{{ route('ponto-de-coletas.update', $pontoDeColeta) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="{{ old('nome') }}">
        @error('nome') <p>{{ $message }}</p> @enderror

        <br>

        <label for="bairro">Bairro:</label>
        <input type="text" name="bairro" id="bairro" value="{{ old('bairro') }}">
        @error('bairro') <p>{{ $message }}</p> @enderror

        <br>

        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" id="cidade" value="{{ old('cidade') }}">
        @error('cidade') <p>{{ $message }}</p> @enderror

        <br>

        <label for="numero">Número:</label>
        <input type="text" name="numero" id="numero" value="{{ old('numero') }}">
        @error('numero') <p>{{ $message }}</p> @enderror

        <br>

        <label for="rua">Rua:</label>
        <input type="text" name="rua" id="rua" value="{{ old('rua') }}">
        @error('numero') <p>{{ $message }}</p> @enderror

        <br>

        <button type="submit">Atualizar</button>
        <a href="{{ route('ponto-de-coletas.index') }}">Cancelar</a>
    </form>
@endsection
