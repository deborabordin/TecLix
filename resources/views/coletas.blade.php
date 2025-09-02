<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Coletas</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
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

    /* Navbar */
    nav.navbar {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background-color: #228B22;
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

    /* Layout principal */
    main.container {
      display: flex;
      margin-top: 60px; /* espaço pro menu fixo */
      height: calc(100vh - 60px);
    }

    .left {
  width: 45%;
  padding: 30px 30px;
  background-color: #f9f9f9;
  border-radius: 12px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  overflow-y: auto;
  margin-left: 20px;
}

.left h2 {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  font-size: 24px;
  color: #228B22;
  margin-bottom: 20px;
}

.left label {
  font-size: 16px;
  font-weight: 600;
  color: #228B22;
  margin-bottom: 6px;
}

.left select,
.left button {
  margin-bottom: 20px;
  padding: 10px 15px;
  font-size: 16px;
  border: 1.8px solid #228B22;
  border-radius: 15px;
  width: 100%;
  background-color: #fcfcfc;
  color: #228B22;
  transition: border-color 0.3s ease, background-color 0.3s ease;
  cursor: pointer;
  font-weight: 600;
}

.left select:hover,
.left button:hover {
  border-color: #228B22;
  background-color: #afd4af;
}

/* Quando o SELECT estiver em foco */
.left select:focus {
  outline: none;
  border-color: #228B22;
  background-color: #cdf0d16b;
}

/* Quando o BOTÃO estiver em foco */
.left button:focus {
  outline: none;
  border-color: #228B22;
  background-color: #52a152; /* mesma cor original */
}

/* Estilo normal do botão */
.left button {
  background-color: #228B22;
  color: rgb(255, 255, 255);
  font-weight: 700;
}

.left button:hover {
  background-color: #073307c7;
}

#descricao {
  margin-top: 25px;
  background-color: #228B22;
  padding: 18px 20px;
  border-radius: 15px;
  font-size: 15px;
  color: #ecffc2;
  box-shadow: 0 2px 8px rgba(56, 65, 35, 0.3);
  display: none;
}

#btn-voltar {
  margin-top: 20px;
  background-color: #228B22;
  color: #ffffff;
  padding: 10px;
  border: 2px solid #228B22;
  border-radius: 12px;
  cursor: pointer;
  font-size: 15px;
  font-weight: 700;
  width: 100%;
  transition: all 0.3s ease;
}

#btn-voltar:hover {
  background-color: #228B22;
  color: white;
}


#btn-voltar:hover {
  background-color: #073307c7;
  color: white;
}


    .right {
      width: 55%;
      height: 100%;
    }

    iframe {
      width: 100%;
      height: 100%;
      border: none;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar">
    <ul class="nav-links">
      <li><a href="{{ route("site.campanhas") }}">Campanhas</a></li>
      <li><a href="{{ route("site.coletas") }}">Ponto de Coletas</a></li>
      <li><a href="{{ route("site.certificado") }}">Certificado</a></li>
    </ul>

    <div class="navbar-right">
      <input type="text" placeholder="Pesquisar..." />
      <div class="social-icons">
        <a href="https://www.instagram.com/teclix25?igsh=Y2oxZ3hzeGFoaGI5"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-whatsapp"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
      </div>
      <a href="{{ route("site.home") }}" class="profile-icon"><i class="fas fa-user"></i></a>
    </div>
  </nav>

  <!-- Conteúdo principal -->
  <main class="container">
    <div class="left">
      <h2>Selecione o Produto e Porte</h2>

      <label for="produto">Produto:</label>
      <select id="produto">
        <option value="">Escolha um produto</option>
        <option>Smartphone</option>
        <option>Notebook</option>
        <option>Televisão</option>
        <option>Tablet</option>
        <option>Impressora</option>
        <option>Console</option>
        <option>Monitor</option>
        <option>Roteador</option>
        <option>Câmera Digital</option>
        <option>Fone de Ouvido</option>
        <option>Carregador</option>
        <option>Teclado</option>
        <option>Mouse</option>
        <option>Microfone</option>
        <option>DVD Player</option>
      </select>

      <label for="porte">Porte:</label>
      <select id="porte">
        <option value=""> Escolha o porte </option>
        <option>Pequeno</option>
        <option>Médio</option>
        <option>Grande</option>
      </select>

      <button id="mostrarDescricao">Avançar</button>

      <div id="descricao"></div>

      <button id="btn-voltar" onclick="history.back()">Voltar</button>
    </div>

    <div class="right">
      <iframe
      src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3718.797705103713!2d-50.647299!3d-21.239869!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x949658db474dfaf5%3A0xf93a99c062de2435!2sEtec%20Guararapes!5e0!3m2!1spt-BR!2sbr!4v1754920058685!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        title="Mapa Ecoponto">
      </iframe>
    </div>
  </main>

  <script>
    const produtosPontuacao = {
      "Smartphone": "65 / 100",
      "Notebook": "80 / 100",
      "Televisão": "100 / 100",
      "Tablet": "65 / 100",
      "Impressora": "90 / 100",
      "Console": "70 / 100",
      "Monitor": "70 / 100",
      "Roteador": "30 / 100",
      "Câmera Digital": "40 / 100",
      "Fone de Ouvido": "10 / 100",
      "Carregador": "10 / 100",
      "Teclado": "25 / 100",
      "Mouse": "15 / 100",
      "Microfone": "25 / 100",
      "DVD Player": "45 / 100"
    };

    const enderecoFixo = "Rua José Dalla Pria, 77 - Continental, Guararapes";
    const horarioFixo = "Segunda a Sexta: 09h00 às 18h00";

    const mostrarBtn = document.getElementById('mostrarDescricao');
    const descricaoDiv = document.getElementById('descricao');
    const produtoSelect = document.getElementById('produto');
    const porteSelect = document.getElementById('porte');

    mostrarBtn.addEventListener('click', () => {
      const produto = produtoSelect.value;
      const porte = porteSelect.value;

      if (!produto || !porte) {
        alert('Por favor, selecione o produto e o porte.');
        return;
      }

      const pontuacao = produtosPontuacao[produto] || "N/A";

      descricaoDiv.innerHTML = `
        <strong>Produto:</strong> ${produto}<br>
        <strong>Porte:</strong> ${porte}<br>
        <strong>Pontuação:</strong> ${pontuacao}<br><br>
        <strong>Endereço:</strong> ${enderecoFixo}<br>
        <strong>Horário de Funcionamento:</strong> ${horarioFixo}
      `;
      descricaoDiv.style.display = 'block';
    });
  </script>
</body>
</html>

