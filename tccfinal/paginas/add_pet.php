<?php
session_start();

if (!isset($_SESSION['tutor_id'])) {
    die("Erro: tutor_id não definido. Por favor, faça login.");
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pegar os dados do formulário
    $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $raca = $_POST['raca'];
    $idade = $_POST['idade'];
    $sexo = $_POST['sexo'];
    $proprietario = $_POST['proprietario'];
    $tutor_id = $_SESSION['tutor_id'];

    // Verificar se os campos não estão vazios
    if (!empty($nome) && !empty($especie) && !empty($raca) && !empty($idade) && !empty($sexo) && !empty($proprietario)) {
        // Conectar ao banco de dados
        $conn = new mysqli("localhost", "root", "", "tcctres");

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Inserir os dados na tabela 'pacientes'
        $sql = "INSERT INTO pacientes (nome, especie, raca, idade, sexo, proprietario, tutor_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssissi", $nome, $especie, $raca, $idade, $sexo, $proprietario, $tutor_id);

        if ($stmt->execute()) {
            echo "Paciente adicionado com sucesso!";
        } else {
            echo "Erro ao adicionar o paciente: " . $conn->error;
        }

        // Fechar conexão
        $stmt->close();
        $conn->close();
    } else {
        echo "Preencha todos os campos.";
    }
}
?>
