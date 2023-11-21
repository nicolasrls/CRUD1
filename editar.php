<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>
<body>

<?php

include ("script.php");

// Verificar a conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Verificar se foi passado um ID válido na URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_cliente = $_GET['id'];

    // Lógica para obter os dados do cliente
    $sql = "SELECT id, nome, email, telefone, dt_nascimento FROM clientes WHERE id = $id_cliente";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $cliente = $result->fetch_assoc();
        ?>
        <h2>Editar Cliente</h2>
        <form action="atualizar.php" method="post">
            <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
            
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $cliente['nome']; ?>"><br>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $cliente['email']; ?>"><br>

            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" value="<?php echo $cliente['telefone']; ?>"><br>

            <label for="dt_nascimento">Data de Nascimento:</label>
            <input type="text" name="dt_nascimento" value="<?php echo $cliente['dt_nascimento']; ?>"><br>

            <input type="submit" value="Atualizar">
        </form>
        <?php
    } else {
        echo "Cliente não encontrado.";
    }
} else {
    echo "ID de cliente inválido.";
}

// Fechar a conexão
$conexao->close();// Verificar a conexão

?>

</body>
</html>
