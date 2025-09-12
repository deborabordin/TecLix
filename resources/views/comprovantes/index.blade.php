<h1>Meus Comprovantes</h1>

<a href="{{ route('comprovantes.create') }}">Enviar novo comprovante</a>

<ul>
@foreach ($comprovantes as $comprovante)
    <li>
        <img src="{{ asset('storage/' . $comprovante->foto) }}" width="100" alt="Foto comprovante">
        <p>Status: {{ $comprovante->status }}</p>
        <p>Observações: {{ $comprovante->observacoes }}</p>
    </li>
@endforeach
</ul>
