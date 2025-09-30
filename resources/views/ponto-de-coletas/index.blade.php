<!-- resources/views/produtos/index.blade.php -->
@extends('layout.app')

@section('conteudo')
<h1>Pontos de Coleta</h1>

<a href="{{ route('ponto-de-coletas.create') }}">Novo</a>

<ul>
    @foreach ($pontoDeColetas as $ponto)
        <li>
            <a href="{{ route('ponto-de-coletas.show', $ponto) }}">{{ $ponto->nome }}</a>
        </li>
    @endforeach
</ul>
@endsection
