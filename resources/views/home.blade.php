@extends('layouts.app')

@section('conteudo')
    <!-- CONTAINER CENTRAL -->
    <div class="content">
        <h1>Bem-vindo!</h1>
        <p>Escolha uma das campanhas abaixo:</p>

        <div class="image-grid">
            <div class="image-item">
            <a href="{{ route("site.campanhas") }}" class="image-card">
                <img src="img/imagem1.jpg" alt="Imagem 1" />
                <span class="card-title">Camapnha X</span>
            </a>
            </div>

            <div class="image-item">
            <a href="{{ route("site.campanhas") }}" class="image-card">
                <img src="img/imagem2.jpg" alt="Imagem 2" />
                <span class="card-title">Campanha Y</span>
            </a>
            </div>

            <div class="image-item">
            <a href="{{ route("site.campanhas") }}" class="image-card">
                <img src="img/imagem3.jpg" alt="Imagem 3" />
                <span class="card-title">Campanha Z</span>
            </a>
            </div>
        </div>
    </div>
@endsection
