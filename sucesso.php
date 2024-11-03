<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Mensagem de Sucesso</title>
<style>
    body {
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: column; /* Stack elements vertically */
      align-items: center;   

      height: 100vh;
      margin: 0;
      background-color: #f0f0f0;
    }

    .container {
      text-align: center;
      background-color: #fff;
      padding: 10px;
      border-radius:   
 20px;
      box-shadow: 0 0 50px rgba(0, 0, 0, 0.1);
      margin-top: 50px; /* Add margin from top for better positioning */
    }

    .success {
      color: #28a745;
      font-size: 20px;
      margin-bottom: 20px;
    }

    /* Add a new class for the button */
    .button-container {
      display: flex; /* Make button container a row */
      justify-content: flex-start; /* Align button to the left */
      margin-bottom: 20px; /* Add space between button and message */
    }
  </style>
</head>
<body>

<!--Botão para cadastrar cliente -->
<div class="container">
 <a href="http://localhost/projetointegrador2/" class="btn btn-link">Cadastrar Clientes</a>
 <a href="http://localhost/projetointegrador2/clientes_cadastrados.php" class="btn btn-link">Clientes cadastrados</a>
</div>


    <div class="container">
        <div class="success">Sucesso!</div>
        <p>Seu cadastro foi realizado com sucesso.</p>
    </div>

    <script>
         // Se tudo estiver preenchido, exibe a mensagem de sucesso
         document.getElementById('mensagemSucesso').style.display = 'block'; // Mostra a mensagem
            setTimeout(() => {
                window.location.href = 'pagina_inicial.html'; // Redireciona para a página inicial (substitua pelo seu arquivo)
            }, 2000); // Aguarda 2 segundos

            return false; // Impede o envio do formulário para manter a mensagem na tela
        }

    </script>
</body>
</html>
