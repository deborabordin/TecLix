@extends('layout.app')

@section('conteudo')
    <h1>Novo Produto</h1>
    <form action="{{ route('produtos.store') }}" method="POST">
        @include('produtos.form')
    </form>
@endsection
