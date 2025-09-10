<!-- resources/views/produtos/index.blade.php -->
@extends('layout.app')

@section('conteudo')
    <h1>Produtos</h1>
    <a href="{{ route('produtos.create') }}">Novo Produto</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Pontuação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>R$ {{ $produto->pontuacao }}</td>
                    <td>
                        <a href="{{ route('produtos.show', $produto) }}">Ver</a>
                        <a href="{{ route('produtos.edit', $produto) }}">Editar</a>
                        <form action="{{ route('produtos.destroy', $produto) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
