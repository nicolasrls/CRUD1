<?php

include("script.php");

// Verificar a conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Verificar se foi enviado um formulário de atualização
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente = $_POST['id'];
    $novo_nome = $_POST['nome'];
    $novo_email = $_POST['email'];
    $novo_telefone = $_POST['telefone'];
    $nova_dt_nascimento = $_POST['dt_nascimento'];

    // Atualizar os dados do cliente no banco de dados
    $sql = "UPDATE clientes SET nome = '$novo_nome', email = '$novo_email', telefone = '$novo_telefone', dt_nascimento = '$nova_dt_nascimento' WHERE id = $id_cliente";

    if ($conexao->query($sql) === TRUE) {
        echo "Cliente atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar cliente: " . $conexao->error;
    }
} else {
    echo "Requisição inválida para atualização.";
}

// Fechar a conexão
$conexao->close();

?>
