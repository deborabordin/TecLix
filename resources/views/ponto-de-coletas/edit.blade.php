@extends('layout.app')

@section('conteudo')
    <h1>Editar Ponto de Coleta</h1>

    <form action="{{ route('ponto-de-coletas.update', $pontoDeColeta) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="{{ old('nome', $pontoDeColeta->nome) }}">
        @error('nome') <p>{{ $message }}</p> @enderror

        <br>

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" id="endereco" value="{{ old('endereco', $pontoDeColeta->endereco) }}">
        @error('endereco') <p>{{ $message }}</p> @enderror

        <br>

        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" id="cidade" value="{{ old('cidade', $pontoDeColeta->cidade) }}">
        @error('cidade') <p>{{ $message }}</p> @enderror

        <br>

        <button type="submit">Atualizar</button>
        <a href="{{ route('ponto-de-coletas.index') }}">Cancelar</a>
    </form>
@endsection
