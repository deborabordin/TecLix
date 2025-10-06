<h1>Revisar Comprovante</h1>

<p><strong>Usuário:</strong> {{ $comprovante->user->name }}</p>
<p><strong>Produto:</strong> {{ $comprovante->produto->nome }} ({{ $comprovante->produto->pontuacao }} pontos)</p>
<img src="{{ asset('storage/' . $comprovante->foto) }}" width="400">

<form method="POST" action="{{ route('admin.comprovantes.aprovar', $comprovante) }}">
    @csrf
    <textarea name="observacoes" placeholder="Observações (opcional)"></textarea>
    <button type="submit">Aprovar</button>
</form>

<form method="POST" action="{{ route('admin.comprovantes.rejeitar', $comprovante) }}">
    @csrf
    <textarea name="observacoes" placeholder="Motivo da rejeição (opcional)"></textarea>
    <button type="submit">Rejeitar</button>
</form>
