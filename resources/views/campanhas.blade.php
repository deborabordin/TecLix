@extends('layouts.app')

@section('conteudo')
    <!-- CONTAINER PRINCIPAL VERDE -->
    <div class="content">
        <div class="info-container">
            <div class="titulo-campanha">
                <h2>Título da Campanha</h2>
                <hr />
                <p class="descricao">
                    Aqui vai a descrição da campanha. Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit.
                </p>
            </div>

            <div class="detalhes-campanha">
                <h3>Informações da Campanha</h3>
                <p>
                    Aqui você pode colocar mais detalhes sobre a campanha, objetivos,
                    datas, etc.
                </p>
            </div>

            <div class="local-campanha">
                <h3>Informações do Local</h3>
                <p>
                    Endereço, horário, contato e outras informações relevantes do local.
                </p>
            </div>

            <a href="{{ route('site.home') }}" class="botao-voltar">Voltar</a>
        </div>

        <div class="imagem-campanha">
            <img src="{{ asset('img/imagem3.jpg') }}" alt="Imagem da Campanha" />
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

        nav.navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #228b22;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 30px;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .nav-links {
            display: flex;
            gap: 30px;
            list-style: none;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .navbar-right input[type='text'] {
            padding: 6px 10px;
            border-radius: 5px;
            border: none;
            font-size: 14px;
            width: 160px;
        }

        .social-icons {
            display: flex;
            gap: 15px;
        }

        .social-icons a {
            color: white;
            font-size: 18px;
            text-decoration: none;
        }

        .profile-icon {
            color: white;
            font-size: 20px;
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
