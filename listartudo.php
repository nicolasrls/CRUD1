<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Clientes</title>
</head>
<body>

<?php

include("script.php");
// Lógica para obter e exibir os clientes

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Lógica para obter e exibir os clientes
$sql = "SELECT id, nome FROM clientes";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nome</th><th>Ação</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['nome']}</td>";
        echo "<td><a href='delete.php?id={$row['id']}'>Excluir</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum cliente encontrado." . $conexao->error; // Adiciona a mensagem de erro específica
}

// Fechar a conexão
$conexao->close();
?>


</body>
</html>
