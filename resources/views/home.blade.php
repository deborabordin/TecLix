@extends('layout.app')

@section('title', 'Página Inicial')

@section('conteudo')
    <div class="content">
        <h1>Bem-vindo à TecLix!</h1>
        <p>Descubra como descartar corretamente seus resíduos.</p>

        <div class="image-grid">
            <div class="image-item">
                <a href="{{route('site.campanhas')}}" class="image-card">
                    <img src="img/imagem1.jpg" alt="Campanha 1">
                    <span class="card-title">Campanha 1</span>
                </a>
            </div>
            <div class="image-item">
                <a href="{{route('site.campanhas')}}#" class="image-card">
                    <img src="img/imagem2.jpg" alt="Campanha 2">
                    <span class="card-title">Campanha 2</span>
                </a>
            </div>
            <div class="image-item">
                <a href="{{route('site.campanhas')}}" class="image-card">
                    <img src="img/imagem3.jpg" alt="Campanha 3">
                    <span class="card-title">Campanha 3</span>
                </a>
            </div>
        </div>
    </div>
@endsection
 
@push('css')
<style>
    /* Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html,
    body {
        height: 100%;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #228B22;

        /* Mais bolinhas, tamanhos variados */
        background-image:
            radial-gradient(rgba(173, 255, 47, 0.25) 40px, transparent 41px),
            radial-gradient(rgba(173, 255, 47, 0.18) 25px, transparent 26px),
            radial-gradient(rgba(173, 255, 47, 0.15) 15px, transparent 16px);

        /* Diminui o tamanho de repetição para ter mais bolinhas */
        background-size: 300px 300px, 250px 250px, 200px 200px;

        /* Posicionamento variado para não ficar simétrico */
        background-position: 0 0, 150px 100px, 100px 200px;
    }

    /* Conteúdo principal -> container no meio da tela */
    main {
        margin-top: 180px;
        /* mantido seu afastamento */
        background: transparent;
        /* deixa ver o verde do body */
        display: flex;
        justify-content: center;
        align-items: stretch;
        padding: 0;
        width: 100%;
        min-height: 50vh;
    }

    /* CAIXA CENTRAL (container esverdeado, arredondado) */
    .content {
        width: 100%;
        height: 100%;
        background: #eef6ee;
        /* tom claro esverdeado */
        border-radius: 16px;
        padding: 28px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .content h1 {
        color: #1d6e1d;
        font-size: 28px;
        margin-bottom: 8px;
    }

    .content p {
        color: #2c7a2c;
        opacity: .9;
    }

    /* Grade de imagens (espaço pras fotos) */
    .image-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(220px, 1fr));
        gap: 28px;
        width: 100%;
        margin-top: 28px;
        justify-items: center;
    }

    .image-item {
        width: 100%;
        max-width: 320px;
    }

    /* CARD com overlay esverdeado e título por cima da foto */
    .image-card {
        position: relative;
        width: 100%;
        height: 180px;
        border-radius: 12px;
        overflow: hidden;
        display: block;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.2);
        transform: translateZ(0);
        transition: transform .25s ease, box-shadow .25s ease;
    }

    .image-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    /* Sombreado esverdeado por cima da foto */
    .image-card::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom,
                rgba(34, 139, 34, 0.70) 0%,
                rgba(34, 139, 34, 0.45) 40%,
                rgba(0, 0, 0, 0.10) 100%);
        pointer-events: none;
    }

    /* Título sobre a foto (fixo no topo, como no print) */
    .card-title {
        position: absolute;
        top: 12px;
        left: 14px;
        right: 14px;
        color: #ffffff;
        font-size: 18px;
        font-weight: 800;
        line-height: 1.2;
        text-align: left;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.35);
        z-index: 1;
    }

    .image-card:hover {
        transform: scale(1.02);
        box-shadow: 0 10px 24px rgba(0, 0, 0, 0.28);
    }

    /* Responsivo */
    @media (max-width: 900px) {
        .image-grid {
            grid-template-columns: repeat(2, minmax(220px, 1fr));
        }
    }

    @media (max-width: 700px) {
        .nav-links {
            gap: 15px;
        }

        .navbar-right input[type="text"] {
            width: 120px;
        }

        .image-grid {
            grid-template-columns: 1fr;
            gap: 22px;
        }
    }
</style>
@endpush

