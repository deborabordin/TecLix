<h1>Enviar Comprovante</h1>

<form action="{{ route('comprovantes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="foto">Foto do Comprovante</label>
    <input type="file" name="foto" id="foto" required>

    <label for="observacoes">Observações (opcional)</label>
    <textarea name="observacoes" id="observacoes"></textarea>

    <button type="submit">Enviar</button>
</form>
