<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
     <!-- Link Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        /* Estilos básicos */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Estilização para dispositivos menores */
        @media (max-width: 768px) {
            table {
                display: block;
                overflow-x: auto;
            }
            th, td {
                display: block;
                width: 100%;
            }
            thead {
                display: none; /* Esconde o cabeçalho para dispositivos menores */
            }
            tr {
                margin-bottom: 15px; /* Espaço entre as linhas */
                border: 1px solid #ddd; /* Borda para cada linha */
            }
            td {
                text-align: right; /* Alinha o texto à direita */
                position: relative; /* Permite o uso de pseudo-elementos */
                padding-left: 50%; /* Espaço para o rótulo */
            }
            td:before {
                content: attr(data-label); /* Adiciona o rótulo correspondente */
                position: absolute;
                left: 10px;
                text-align: left;
                font-weight: bold; /* Destaca o rótulo */
            }
        }
    </style>
</head>
<body>


<!--Botão para cadastrar cliente -->
<div class="container">
 <a href="http://localhost/projetointegrador2/" class="btn btn-outline-primary">Cadastrar Clientes</a>
</div>

<h1>Clientes Cadastrados</h1>

<?php
// Configurações de conexão com o banco de dados
$servername = "localhost";  // Endereço do servidor
$username = "root";         // Usuário do banco de dados
$password = "";             // Senha do banco de dados (deixe vazio se não houver senha)
$dbname = "projetointegrador2";  // Nome do banco de dados

// Criar uma nova conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Definir e executar a consulta SQL
$sql = "SELECT nome, sobrenome, cpf, cidade, bairro, rua, numero, celular, servico FROM cliente";
$result = $conn->query($sql);

// Verificar se a consulta retornou resultados
if ($result->num_rows > 0) {
    // Criar a tabela HTML
    echo "<table>";
    echo "<thead><tr>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>CPF</th>
            <th>Cidade</th>
            <th>Bairro</th>
            <th>Rua</th>
            <th>Número</th>
            <th>Celular</th>
            <th>Serviço</th>
          </tr></thead>";
    echo "<tbody>";
    
    // Exibir os dados linha por linha
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td data-label='Nome'>" . htmlspecialchars($row["nome"]) . "</td>";
        echo "<td data-label='Sobrenome'>" . htmlspecialchars($row["sobrenome"]) . "</td>";
        echo "<td data-label='CPF'>" . htmlspecialchars($row["cpf"]) . "</td>";
        echo "<td data-label='Cidade'>" . htmlspecialchars($row["cidade"]) . "</td>";
        echo "<td data-label='Bairro'>" . htmlspecialchars($row["bairro"]) . "</td>";
        echo "<td data-label='Rua'>" . htmlspecialchars($row["rua"]) . "</td>";
        echo "<td data-label='Número'>" . htmlspecialchars($row["numero"]) . "</td>";
        echo "<td data-label='Celular'>" . htmlspecialchars($row["celular"]) . "</td>";
        echo "<td data-label='Serviço'>" . htmlspecialchars($row["servico"]) . "</td>";
        echo "</tr>";
    }
    
    echo "</tbody></table>";
} else {
    // Mensagem caso não haja clientes cadastrados
    echo "<p>Nenhum cliente cadastrado.</p>";
}

// Fechar a conexão com o banco de dados
$conn->close();
?>

</body>
</html>

