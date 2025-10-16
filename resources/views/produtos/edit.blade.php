@extends('layout.app')

@section('conteudo')
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="card" style="padding: 15px; margin-top: 15px;">
                <div class="card-title">
                    <h5 class="text-center">Editar Produto</h5>
                </div>
                <div class="card-text">
                    <form action="{{ route('produtos.update', $produto) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('produtos.form')
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
@endsection
