<h1>Comprovantes Pendentes</h1>

@foreach($comprovantes as $comprovante)
    <div style="border: 1px solid #ccc; padding: 10px; margin: 10px;">
        <p><strong>Usuário:</strong> {{ $comprovante->user->name }}</p>
        <p><strong>Produto:</strong> {{ $comprovante->produto->nome }}</p>
        <img src="{{ asset('storage/' . $comprovante->foto) }}" width="200" alt="Foto do comprovante">
        <p><a href="{{ route('admin.comprovantes.show', $comprovante) }}">Revisar</a></p>
    </div>
@endforeach
