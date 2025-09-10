@extends('layout.app')

@section('conteudo')
    <h1>{{ $produto->nome }}</h1>
    <p>Pontuação: R$ {{ $produto->pontuacao }}</p>
    <a href="{{ route('produtos.index') }}">Voltar</a>
@endsection
