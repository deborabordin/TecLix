@extends('layout.app')

@section('title', 'Gerar Certificado')

@section('conteudo')
    <div class="page-header">
        <h1>Gerar Certificado</h1>
    </div>

    <main>
        <a href="{{ url()->previous() }}" class="back-btn">← Voltar</a>

        <div class="card">
            <label for="nome">Nome completo</label>
            <input id="nome" type="text" placeholder="Seu nome completo" />

            <label for="campCert">Campanha</label>
            <select id="campCert">
                <option>Campanha A</option>
                <option>Campanha B</option>
                <option>Campanha C</option>
            </select>

            <button class="btn" onclick="gerarCertificado()">Gerar e imprimir</button>
        </div>
    </main>
@endsection

@push('css')
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            background: #d1e7db;
            color: #111;
        }

        .page-header {
            background: #e6f4ec;
            padding: 32px 20px;
            text-align: center;
            border-bottom: 2px solid #d1e7db;
        }

        .page-header h1 {
            margin: 0;
            font-size: 28px;
            color: #14532d;
        }

        main {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #fff;
            color: #14532d;
            border: 2px solid #16a34a;
            padding: 8px 14px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: .2s;
        }

        .back-btn:hover {
            background: #16a34a;
            color: #fff;
        }

        .card {
            background: #fff;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-top: 20px;
        }

        label {
            display: block;
            margin: 12px 0 6px;
            font-weight: 600;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        .btn {
            background: #16a34a;
            border: none;
            color: #fff;
            padding: 12px 18px;
            margin-top: 16px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            font-size: 15px;
        }

        .btn:hover {
            background: #138d3a;
        }
    </style>
@endpush

@push('scripts')
    <script>
        function gerarCertificado() {
            const nome = document.getElementById('nome').value.trim();
            const camp = document.getElementById('campCert').value;
            if (!nome) {
                alert("Digite seu nome completo");
                return;
            }

            const data = new Date().toLocaleDateString('pt-BR', {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            });

            const w = window.open('', '_blank', 'width=1000,height=700');
            const html = `
      <html><head><title>Certificado</title>
      <style>
        body{font-family:'Times New Roman',serif;background:#f9fafb;margin:0;padding:0;}
        .cert{
          width:85%; margin:40px auto; padding:40px;
          border:10px solid #16a34a; border-radius:20px;
          background:white; position:relative; text-align:center;
        }
        .cert::before{
          content:""; position:absolute; inset:0;
          background:url('img/logoo.png') center/220px no-repeat;
          opacity:0.06;
        }
        h1{font-size:40px; color:#16a34a; margin-bottom:20px;}
        p{font-size:18px; margin:12px 0; line-height:1.6;}
        .name{font-size:26px; font-weight:bold; color:#111; margin:20px 0;}
        .assinatura{margin-top:60px;}
        .assinatura hr{width:200px; border:1px solid #111;}
        .assinatura span{font-size:14px; color:#555;}
        footer{margin-top:40px; font-size:14px; color:#777;}
      </style></head>
      <body>
        <div class="cert">
          <h1>Certificado de Participação</h1>
          <p>A Teclix certifica que</p>
          <p class="name">${nome}</p>
          <p>participou da <strong>${camp}</strong>, contribuindo para o descarte responsável de resíduos eletrônicos.</p>
          <p>Emitido em ${data}</p>
          <div class="assinatura">
            <hr>
            <span>Coordenação do Projeto Teclix</span>
          </div>
          <footer>Teclix — Descarte Eletrônico Responsável • @teclix25</footer>
        </div>
      </body></html>`;
            w.document.write(html);
            w.document.close();
            setTimeout(() => w.print(), 800);
        }
    </script>
@endpush
