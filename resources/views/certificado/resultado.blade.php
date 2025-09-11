<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Certificado</title>
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
</head>
<body>
    <div class="cert">
        <h1>Certificado de Participação</h1>
        <p>A Teclix certifica que</p>
        <p class="name">{{ $nome }}</p>
        <p>participou da <strong>{{ $campanha }}</strong>, contribuindo para o descarte responsável de resíduos eletrônicos.</p>
        <p>Emitido em {{ $data }}</p>
        <div class="assinatura">
            <hr />
            <span>Coordenação do Projeto Teclix</span>
        </div>
        <footer>Teclix — Descarte Eletrônico Responsável • @teclix25</footer>
    </div>

    <script>
        window.onload = function () {
            window.print();
        };
    </script>
</body>
</html>
