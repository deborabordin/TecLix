<!DOCTYPE html>
<html>
<head>
    <title>Certificado de Participação</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 30px; }
        .certificado { border: 5px solid #4CAF50; padding: 40px; }
        h1 { color: #4CAF50; }
    </style>
</head>
<body>
    <div class="certificado">
        <h1>Certificado de Participação</h1>
        <p>Certificamos que <strong>{{ $nome }}</strong></p>
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
    </div>
</body>
</html>

    <style>
        body {
            font-family: 'Times New Roman', serif;
            background: #f9fafb;
            margin: 0;
            padding: 0;
        }
        .cert {
            width: 85%;
            margin: 40px auto;
            padding: 40px;
            border: 10px solid #16a34a;
            border-radius: 20px;
            background: white;
            position: relative;
            text-align: center;
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
    </style>

