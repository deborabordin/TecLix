@extends('layout.app')

@section('title', 'Campanha')

@section('conteudo')
<div class="content">
    <div class="info-container">
        @if($campanha)
            <div class="titulo-campanha">
                <h2>{{ $campanha->titulo }}</h2>
                <hr />
                <p class="descricao">{{ $campanha->descricao }}</p>
            </div>

            <div class="detalhes-campanha">
                <h3>Informações da Campanha</h3>
                <p>{{ $campanha->detalhes }}</p>
            </div>

            <div class="local-campanha">
                <h3>Informações do Local</h3>
                <p>{{ $campanha->local }}</p>
            </div>

            {{-- BOTÃO DE PARTICIPAÇÃO --}}
            @auth
                @if(!$campanha->participantes->contains(auth()->user()->id))
                    <form id="participar-form" action="{{ route('campanha.participar', $campanha->id) }}" method="POST">
                        @csrf
                        <button type="submit" id="btn-participar" class="botao-participar">Quero Participar</button>
                    </form>
                @else
                    <p style="margin-top: 10px; color: #fff;">✅ Você já está participando desta campanha.</p>
                @endif
            @else
                <p>Faça login para participar.</p>
            @endauth

            <a href="{{ route('site.home') }}" class="botao-voltar">Voltar</a>
        @else
            <p>Nenhuma campanha ativa no momento.</p>
        @endif
    </div>

    <div class="imagem-campanha">
        @if($campanha && $campanha->imagem)
            <img src="{{ asset('storage/' . $campanha->imagem) }}" alt="Imagem da Campanha" width="200">
        @endif
    </div>
</div>
@endsection

@push('css')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f2f2f2;
    }

    main {
        margin-top: 180px;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .content {
        background: #228b22;
        width: 100%;
        padding: 60px 80px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: white;
        gap: 40px;
        flex-wrap: nowrap;
    }

    .botao-participar {
        background-color: #fff;
        color: #228b22;
        font-weight: bold;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .botao-participar:hover {
        background-color: #e6e6e6;
    }

    .botao-voltar {
        margin-top: 20px;
        padding: 10px 20px;
        background-color: white;
        color: #228b22;
        font-weight: bold;
        font-size: 16px;
        border: none;
        border-radius: 8px;
        text-decoration: none;
        width: fit-content;
        transition: background-color 0.3s ease;
        cursor: pointer;
        display: inline-block;
    }

    .botao-voltar:hover {
        background-color: #e6e6e6;
    }

    @media (max-width: 900px) {
        .content {
            flex-direction: column;
            align-items: center;
            padding: 40px 20px;
            text-align: center;
        }

        .imagem-campanha {
            margin-top: 30px;
        }

        .imagem-campanha img {
            width: 250px;
            height: 250px;
        }

        .info-container {
            padding-right: 0;
        }
    }
</style>
@endpush

@push('scripts')
<script>
document.getElementById('participar-form')?.addEventListener('submit', function(e) {
    e.preventDefault();

    fetch(this.action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            'Accept': 'application/json',
        },
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message);
        location.reload();
    })
    .catch(err => alert('Erro ao participar da campanha.'));
});
</script>
@endpush
