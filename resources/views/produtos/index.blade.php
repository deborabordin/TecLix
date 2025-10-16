<!-- resources/views/produtos/index.blade.php -->
@extends('layout.app')

@section('conteudo')
    <div class="row">
        <div class="col-lg-12">
            <div class="card text-center">
                <div class="card-title" style="padding: 20px;">
                    <h5>Produtos</h5>

                    </div>

                <div class="card-text">

                    <a class="btn btn-success" href="{{ route('produtos.create') }}">Novo Produto</a>

                    <br><br>



                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Pontuação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produtos as $produto)
                                <tr>
                                    <td>{{ $produto->nome }}</td>
                                    <td>{{ $produto->pontuacao }}</td>
                                    <td>
                                        <a class="btn btn-outline-secondary"
                                            href="{{ route('produtos.show', $produto) }}">Ver</a>
                                        <a class="btn btn-outline-secondary"
                                            href="{{ route('produtos.edit', $produto) }}">Editar</a>
                                        <form action="{{ route('produtos.destroy', $produto) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger" type="submit"
                                                onclick="return confirm('Tem certeza?')">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
