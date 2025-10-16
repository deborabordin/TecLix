<!-- resources/views/produtos/form.blade.php -->
@csrf

<label>Nome:</label>
<input class="form-control" type="text" name="nome" value="{{ old('nome', $produto->nome ?? '') }}"><br>
@error('nome')
    <p>{{ $message }}</p>
@enderror

<label>Pontuação:</label>
<input class="form-control" type="text" name="pontuacao" value="{{ old('pontuacao', $produto->pontuacao ?? '') }}"><br>
@error('pontuacao')
    <p>{{ $message }}</p>
@enderror


<p class="text-center">
    <a class="btn btn-secondary" href="{{ route('produtos.index') }}">Voltar</a>
    <button class="btn btn-success" type="submit">Salvar</button>
</p>
