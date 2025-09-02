<!-- resources/views/produtos/form.blade.php -->
@csrf

<label>Nome:</label>
<input type="text" name="nome" value="{{ old('nome', $produto->nome ?? '') }}"><br>

<label>Pontuação:</label>
<input type="text" name="pontuacao" value="{{ old('pontuacao', $produto->pontuacao ?? '') }}"><br>

<button type="submit">Salvar</button>
