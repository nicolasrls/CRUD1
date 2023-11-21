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


// Verificar a conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Lógica para obter e exibir os clientes
$sql = "SELECT id, nome, email, telefone, dt_nascimento FROM clientes";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Data de Nascimento</th><th>Ação</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['nome']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['telefone']}</td>";
        echo "<td>{$row['dt_nascimento']}</td>";
        echo "<td><a href='delete.php?id={$row['id']}'>Excluir</a> | <a href='editar.php?id={$row['id']}'>Editar</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum cliente encontrado." . $conexao->error;
}

// Fechar a conexão
$conexao->close();
?>

</body>
</html>
