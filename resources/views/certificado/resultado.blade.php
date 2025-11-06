<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Certificado de Participação</title>

    <style>
        body {
            font-family: 'Times New Roman', serif;
            background: #f9fafb;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .cert {
            width: 85%;
            margin: 40px auto;
            padding: 40px;
            border: 10px solid #16a34a;
            border-radius: 20px;
            background: white;
            position: relative;
        }

        .cert::before {
            content: "";
            position: absolute;
            inset: 0;
            background: url('/img/logoo.png') center/220px no-repeat;
            opacity: 0.06;
            z-index: -1;
        }

        h1 {
            font-size: 40px;
            color: #16a34a;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin: 12px 0;
            line-height: 1.6;
        }

        .name {
            font-size: 26px;
            font-weight: bold;
            color: #111;
            margin: 20px 0;
        }

        .assinatura {
            margin-top: 60px;
        }

        .assinatura hr {
            width: 200px;
            border: 1px solid #111;
        }

        .assinatura span {
            font-size: 14px;
            color: #555;
        }

        footer {
            margin-top: 40px;
            font-size: 14px;
            color: #777;
        }

        /* 🔘 Botão de impressão */
        .btn-imprimir {
            background-color: #16a34a;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 25px;
            transition: 0.3s;
        }

        .btn-imprimir:hover {
            background-color: #138d3a;
        }

        /* 🖨️ Esconde o botão na impressão */
        @media print {
            .btn-imprimir {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="cert" id="certificado">
        <h1>Certificado de Participação</h1>

        <p>Certificamos que</p>
        <p class="name">{{ $nome }}</p>

        <p>participou da <strong>{{ $campanha }}</strong></p>
        <p>em {{ $data }}.</p>

        <p>Durante a campanha, o(a) participante:</p>
        <ul style="text-align: left; display: inline-block;">
            @foreach($lixos as $tipo => $quantidade)
                <li>Descartou {{ $quantidade }}x {{ $tipo }}</li>
            @endforeach
        </ul>

        <p><strong>Total de pontos acumulados: {{ $totalPontos }}</strong></p>

        <p>Parabéns por contribuir com a preservação do meio ambiente!</p>

        <div class="assinatura">
            <hr>
            <span>Assinatura da Coordenação</span>
        </div>

        <footer>
            TECLIX
        </footer>

        <!-- 🔘 Botão de impressão -->
        <button class="btn-imprimir" onclick="window.print()">🖨️ Imprimir Certificado</button>
    </div>
</body>
</html>
