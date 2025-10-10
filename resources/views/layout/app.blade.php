<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'TecLix')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
        /* Reset */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar fixa (menu superior) */
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

        main {
            margin-top: 100px; /* deixa espaço pro menu fixo */
            padding: 20px;
        }

    </style>

    @stack('css')
</head>

<body>

    <nav class="navbar">
        <div class="navbar-left">
            <a href="{{ route('site.home') }}">
                <img src="{{ asset('img/logoo.png') }}" alt="logo" class="logo" />
            </a>

            <ul class="nav-links">
                <li><a href="{{ route('site.campanhas') }}">Campanhas</a></li>
                <li><a href="{{ route('site.coletas') }}">Ponto de Coletas</a></li>
                <li><a href="{{ route('certificado.gerar') }}">Certificado</a></li>
            </ul>
        </div>

        <div class="navbar-right">
            <input type="text" placeholder="Pesquisar..." />
            <div class="social-icons">
                <a href="https://www.instagram.com/teclix25" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
            <a href="{{ route('site.perfil') }}" class="profile-icon"><i class="fas fa-user"></i></a>
        </div>
    </nav>

    <main>
        @yield('conteudo')
    </main>

</body>
</html>
