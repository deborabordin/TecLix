@extends('layout.app')

@section('conteudo')
    <div class="content">
        <div class="info-container">
            @if ($campanha)
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

                <a href="{{ url('/admin/campanhas') }}" class="botao-voltar">Voltar</a>
            @else
                <p>Nenhuma campanha ativa no momento.</p>
            @endif
        </div>

        <div class="imagem-campanha">
            @if ($campanha && $campanha->imagem)
                <img src="{{ asset('storage/' . $campanha->imagem) }}" alt="Imagem da campanha">
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

        /* CONTAINER VERDE */
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

        .info-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-right: 20px;
        }

        .titulo-campanha h2 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .titulo-campanha hr {
            width: 60px;
            border: 1px solid white;
            margin-bottom: 16px;
        }

        .descricao {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .detalhes-campanha h3,
        .local-campanha h3 {
            font-size: 22px;
            margin-bottom: 10px;
            color: #e0ffe0;
        }

        .detalhes-campanha p,
        .local-campanha p {
            font-size: 16px;
            margin-bottom: 20px;
            color: #f0fff0;
        }

        .imagem-campanha {
            flex: 0 0 350px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .imagem-campanha img {
            width: 350px;
            height: 350px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            border: 3px solid #ffffff80;
            /* Bordinha branca translúcida */
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
