@extends('layouts.app')

@section('conteudo')
    <h1>Editar Produto</h1>
    <form action="{{ route('produtos.update', $produto) }}" method="POST">
        @csrf
        @method('PUT')
        @include('produtos.form')
    </form>
@endsection
