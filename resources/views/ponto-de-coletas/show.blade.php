<h2>Produtos neste ponto:</h2>
<ul>
    @foreach ($pontoDeColeta->produtos as $produto)
        <li>{{ $produto->nome }}</li>
    @endforeach
</ul>


<h3>Adicionar produto ao ponto</h3>

<form action="{{ route('ponto-de-coletas.addProduto', $pontoDeColeta) }}" method="POST">
    @csrf
    <select name="produto_id">
        @foreach ($produtosDisponiveis as $produto)
            <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
        @endforeach
    </select>
    <button type="submit">Adicionar</button>
</form>
