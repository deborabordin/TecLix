a<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Teclix</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #0f6e30 url('fundo.png') repeat;
            background-size: 150px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background: linear-gradient(160deg, #018a3e, #026b2c);
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            width: 300px;
            color: white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }
        .home-icon {
            font-size: 24px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            width: 35px;
            height: 35px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px;
        }
        .logo {
            width: 100px;
            margin-bottom: 10px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: none;
            border-radius: 8px;
            background: rgba(255,255,255,0.2);
            color: white;
            outline: none;
        }
        input::placeholder {
            color: rgba(255,255,255,0.7);
        }
        button {
            background: #58d26b;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 8px;
            width: 100%;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #45b659;
        }
        .links {
            margin-top: 10px;
        }
        .links a {
            color: white;
            font-size: 14px;
            text-decoration: none;
        }
        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="home-icon">🏠</div>
            <img src="{{ asset("img/logoo.png") }}" alt="Teclix Logo" class="logo">
            <h2>Criar Conta</h2>

            <form onsubmit="event.preventDefault(); window.location.href='telaInicial.html';">
                <input type="text" placeholder="Nome completo" required>
                <input type="email" placeholder="Email" required>
                <input type="password" placeholder=" Confirmar a senha" required>
                <button type="submit">Cadastrar</button>
            </formonsubmit=>

            <div class="links">
                <a href="{{ route("site.login") }}">Já tenho conta</a>
            </div>
        </div>
    </div>
</body>
</html>
