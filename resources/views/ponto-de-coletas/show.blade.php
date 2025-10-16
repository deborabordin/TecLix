@extends('layout.app')

@section('conteudo')
    <h4>Detalhes do Ponto de Coleta: {{ $pontoDeColeta->nome }}</h4>
    <br />

    <p>Adicionar produto:</p>

    <form action="{{ route('ponto-de-coletas.addProduto', $pontoDeColeta) }}" method="POST">

        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9">
                @csrf
                <select class="form-control" name="produto_id">
                    <option value="">Selecione um produto</option>
                    @foreach ($produtosDisponiveis as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <button class="btn btn-success btn-block" type="submit">Adicionar</button>
                <a class="btn btn-secondary" href="{{ route('ponto-de-coletas.index') }}">Voltar</a>
            </div>
        </div>


    </form>

    <div class="row mt-5">
        <div class="col-lg-12">
            <p>Produtos neste ponto:</p>
            <ul class="list-group">
                @foreach ($pontoDeColeta->produtos as $produto)
                    <li class="list-group-item">{{ $produto->nome }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
