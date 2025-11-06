@extends('layout.app')

@section('conteudo')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body">
            <h1 class="text-center text-primary fw-bold mb-4">
                📋 Comprovantes Pendentes
            </h1>

            @if($comprovantes->isEmpty())
                <div class="alert alert-info text-center">
                    Nenhum comprovante pendente no momento.
                </div>
            @else
                <div class="row g-4">
                    @foreach($comprovantes as $comprovante)
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm rounded-3">
                                <div class="card-body">
                                    <h5 class="card-title text-secondary fw-bold">
                                        {{ $comprovante->produto->nome }}
                                    </h5>
                                    <p class="mb-1">
                                        <strong>Usuário:</strong> {{ $comprovante->user->name }}
                                    </p>
                                    <p>
                                        <strong>Pontuação:</strong>
                                        <span class="badge bg-success">
                                            {{ $comprovante->produto->pontuacao }} pts
                                        </span>
                                    </p>
                                    <div class="text-center mb-3">
                                        <img src="{{ asset('storage/' . $comprovante->foto) }}"
                                             alt="Foto do comprovante"
                                             class="img-fluid rounded border shadow-sm"
                                             style="max-width: 200px;">
                                    </div>

                                    <a href="{{ route('admin.comprovantes.show', $comprovante) }}"
                                       class="btn btn-primary w-100 fw-semibold">
                                        🔍 Revisar Comprovante
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
