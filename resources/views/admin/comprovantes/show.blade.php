@extends("layout.app")

@section('conteudo')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body">
            <h1 class="text-center mb-4 text-primary fw-bold">Revisar Comprovante</h1>

            <div class="mb-4 text-center">
                <img src="{{ asset('storage/' . $comprovante->foto) }}"
                    alt="Foto do Comprovante"
                    class="img-fluid rounded-3 border shadow-sm"
                    style="max-width: 400px;">
            </div>

            <div class="mb-4">
                <p><strong>🧍 Usuário:</strong> {{ $comprovante->user->name }}</p>
                <p><strong>📦 Produto:</strong> {{ $comprovante->produto->nome }}
                    <span class="badge bg-success">{{ $comprovante->produto->pontuacao }} pts</span>
                </p>
            </div>

            <div class="row g-3">
                {{-- Formulário de Aprovação --}}
                <div class="col-md-6">
                    <div class="card border-success border-2 h-100">
                        <div class="card-body">
                            <h5 class="text-success fw-bold mb-3">Aprovar Comprovante</h5>
                            <form method="POST" action="{{ route('admin.comprovantes.aprovar', $comprovante) }}">
                                @csrf
                                <div class="mb-3">
                                    <textarea name="observacoes" class="form-control" rows="3" placeholder="Observações (opcional)"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success w-100 fw-semibold">
                                    ✅ Aprovar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Formulário de Rejeição --}}
                <div class="col-md-6">
                    <div class="card border-danger border-2 h-100">
                        <div class="card-body">
                            <h5 class="text-danger fw-bold mb-3">Rejeitar Comprovante</h5>
                            <form method="POST" action="{{ route('admin.comprovantes.rejeitar', $comprovante) }}">
                                @csrf
                                <div class="mb-3">
                                    <textarea name="observacoes" class="form-control" rows="3" placeholder="Motivo da rejeição (opcional)"></textarea>
                                </div>
                                <button type="submit" class="btn btn-danger w-100 fw-semibold">
                                    ❌ Rejeitar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
