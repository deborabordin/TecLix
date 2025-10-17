@extends('layout.app')

@section('conteudo')
    <div class="row">
        <div class="col-lg-12">
            <div class="card text-center">
                <div class="card-title" style="padding: 20px;">
                    <h5>Campanhas</h5>

                </div>

                <div class="card-text">

                    <a class="btn btn-success" href="{{ route('campanhas.create') }}">Nova Campanha</a>

                    <br><br>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th width="280px">Ação</th>
                        </thead>
                        <tbody>
                            @foreach ($campanhas as $campanha)
                                <tr>

                                    <td>{{ $campanha->titulo }}</td>
                                    <td>{{ $campanha->descricao }}</td>
                                    <td>
                                        <form action="{{ route('campanhas.destroy', $campanha) }}" method="POST">

                                            <a class="btn btn-outline-secondary"
                                                href="{{ route('campanhas.show', $campanha) }}">Mostrar</a>

                                            <a class="btn btn-outline-secondary"
                                                href="{{ route('campanhas.edit', $campanha) }}">Editar</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-outline-danger"
                                                onclick="return confirm('Tem certeza?')">Deletar</button>

                                             
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

