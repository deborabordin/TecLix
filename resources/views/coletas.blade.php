@extends('layout.app')

@section('conteudo')
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
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3718.797705103713!2d-50.647299!3d-21.239869!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x949658db474dfaf5%3A0xf93a99c062de2435!2sEtec%20Guararapes!5e0!3m2!1spt-BR!2sbr!4v1754920058685!5m2!1spt-BR!2sbr"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
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
@endsection

@push('css')
<style>
/* Reset básico para margem, padding e box-sizing */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Estilo básico do body */
body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background-color: #f2f2f2;
  padding-top: 60px; 
}

  /* REMOVIDO nav.navbar (menu) pois não quer no ponto de coleta */

  /* Layout principal */
main.container {
  margin-top: 60px; /* para não ficar embaixo do menu */
  height: calc(100vh - 60px); /* ocupa o resto da tela */
  display: flex;
}



  .left {
    width: 45%;
    padding: 30px 30px;
    background-color: #fff; /* fundo branco simples */
    /* Removidos border-radius, box-shadow e margin-left */
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    overflow-y: auto;
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

  .left select:focus {
    outline: none;
    border-color: #228B22;
    background-color: #cdf0d16b;
  }

  .left button:focus {
    outline: none;
    border-color: #228B22;
    background-color: #52a152;
  }

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
@endpush

