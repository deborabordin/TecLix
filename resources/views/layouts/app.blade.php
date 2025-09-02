<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <title>Tela inicial</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
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

        /* Navbar fixa (mantida) */
        nav.navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 80px;
            background-color: #228B22;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .navbar-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .logo {
            height: 60px;
            width: auto;
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
            line-height: 80px;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .navbar-right input[type="text"] {
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

        /* Footer "Sobre Nós" (mantido) */
        footer.sobre-nos {
            width: 100vw;
            /* <- garante 100% da tela */
            background-color: #228B22;
            padding: 60px 0 40px;
            display: flex;
            justify-content: center;
        }

        /* Container interno também com largura total */
        footer.sobre-nos .container {
            max-width: 100% !important;
            margin: 0 !important;
            background-color: white;
            color: #228B22;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            padding: 20px 30px;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Responsivo (mantido e ajustado para os cards) */
        @media (max-width: 900px) {
            .image-grid {
                grid-template-columns: repeat(2, minmax(220px, 1fr));
            }
        }

        @media (max-width: 700px) {
            footer.sobre-nos .container {
                width: 90%;
            }

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

    @stack('css')
</head>

<body>

    <nav class="navbar">
        <div class="navbar-left">
            <a href="{{ route('site.home') }}">
                <img src="img/logoo.png" alt="logo" class="logo" />
            </a>

            <ul class="nav-links">
                <li><a href="{{ route('site.campanhas') }}">Campanhas</a></li>
                <li><a href="{{ route('site.coletas') }}">Ponto de Coletas</a></li>
                <li><a href="{{ route('site.certificado') }}">Certificado</a></li>
            </ul>
        </div>

        <div class="navbar-right">
            <input type="text" placeholder="Pesquisar..." />
            <div class="social-icons">
                <a href="https://www.instagram.com/teclix25?igsh=Y2oxZ3hzeGFoaGI5" target="_blank"
                    rel="noopener noreferrer"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
            <a href="{{ route('site.perfil') }}" class="profile-icon"><i class="fas fa-user"></i></a>
        </div>
    </nav>

    <main>
        @yield('conteudo')
    </main>

    <footer class="sobre-nos">
        <div class="container">
            <p>Sobre Nós: Somos uma empresa 100% feminina, dedicada a melhorar o mundo ajudando você a descartar os
                produtos com responsabilidade ambiental e social.</p>
        </div>
    </footer>

</body>

</html>
