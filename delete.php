<?php

include("script.php");


// Verificar a conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Verificar se foi passado um ID válido na URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Executar a consulta de exclusão
    $sql = "DELETE FROM clientes WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        echo "Cliente excluído com sucesso!";
        echo "<br><button><a href='index.php'>Voltar para pagina inicial</a></button>";
    } else {
        echo "Erro ao excluir cliente: " . $conexao->error;
    }
} else {
    echo "ID de cliente inválido.";
}

// Fechar a conexão
$conexao->close();
?>
