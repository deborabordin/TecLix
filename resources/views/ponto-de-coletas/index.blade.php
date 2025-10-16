<!-- resources/views/produtos/index.blade.php -->
@extends('layout.app')

@section('conteudo')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <br/>
                    <h4 class="text-center" style="padding: 20px;">Pontos de Coleta</h4>
                </div>
                <div class="card-text text-center">

                    
                    <a class="btn btn-success" href="{{ route('ponto-de-coletas.create') }}">Novo</a>


                    <br><br>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Cidade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pontoDeColetas as $ponto)
                                <tr>
                                    <td>{{ $ponto->nome }}</td>
                                    <td>{{ $ponto->cidade }}</td>
                                    <td>
                                        <a class="btn btn-outline-secondary"
                                            href="{{ route('ponto-de-coletas.show', $ponto) }}">Ver</a>
                                        <a class="btn btn-outline-secondary"
                                            href="{{ route('ponto-de-coletas.edit', $ponto) }}">Editar</a>
                                        <form action="{{ route('ponto-de-coletas.destroy', $ponto) }}" method="POST"
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
