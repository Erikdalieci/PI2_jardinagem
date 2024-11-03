<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projetointegrador2";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Função para inserir cliente
function inserirCliente($conn, $nome, $sobrenome, $cpf, $cidade, $bairro, $rua, $numero, $celular, $servico) {
    try {
        $stmt = $conn->prepare("INSERT INTO cliente (nome, sobrenome, cpf, cidade, bairro, rua, numero, celular, servico) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $nome, $sobrenome, $cpf, $cidade, $bairro, $rua, $numero, $celular, $servico);
        $stmt->execute();
        $stmt->close();
        return true;
    } catch (Exception $e) {
        error_log("Erro ao inserir cliente: " . $e->getMessage());
        return false;
    }
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recebe os dados do formulário e sanitiza
    $nome = htmlspecialchars($_POST['nome'] ?? '', ENT_QUOTES);
    $sobrenome = htmlspecialchars($_POST['sobrenome'] ?? '', ENT_QUOTES);
    $cpf = htmlspecialchars($_POST['cpf'] ?? '', ENT_QUOTES);
    $cidade = htmlspecialchars($_POST['cidade'] ?? '', ENT_QUOTES);
    $bairro = htmlspecialchars($_POST['bairro'] ?? '', ENT_QUOTES);
    $rua = htmlspecialchars($_POST['rua'] ?? '', ENT_QUOTES);
    $numero = htmlspecialchars($_POST['numero'] ?? '', ENT_QUOTES);
    $celular = htmlspecialchars($_POST['celular'] ?? '', ENT_QUOTES);
    $servico = htmlspecialchars($_POST['servico'] ?? '', ENT_QUOTES);


    // Verificar se o CPF já existe
    $stmt = $conn->prepare("SELECT COUNT(*) FROM cliente WHERE cpf = ?");
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    // Validação básica
    if (empty($nome) || empty($sobrenome) || empty($cpf) || empty($cidade) || empty($bairro) || empty($rua) || empty($numero) || empty($celular) || empty($servico)) {
        echo "Todos os campos são obrigatórios.";
        exit;
    }

    if ($count > 0) {
        echo "CPF já cadastrado.";
    } else {
        if (inserirCliente($conn, $nome, $sobrenome, $cpf, $cidade, $bairro, $rua, $numero, $celular, $servico)) {
            // Redireciona após a inserção bem-sucedida
            header("Location: sucesso.php");
            exit; // Adicione exit após header para evitar execução adicional
        } else {
            echo "<p>Ocorreu um erro ao cadastrar o cliente. Por favor, tente novamente mais tarde.</p>";
        }
    }
}
$conn->close();
?>
