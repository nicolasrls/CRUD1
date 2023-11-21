<?php

include("script.php");

// Obter a opção selecionada
$opcaoSelecionada = $_POST["opcoes"];
// Obter o valor do campo de texto do formulário
$textoBusca = $_POST["textoBusca"];
// Validar e escapar o valor do campo de texto para evitar injeção de SQL
$textoBusca = $conexao->real_escape_string($textoBusca);

// Determinar a coluna a ser pesquisada com base na opção selecionada
switch ($opcaoSelecionada) {
    case "nome":
        $coluna = "nome";
        break;
    case "email":
        $coluna = "email";
        break;
    case "telefone":
        $coluna = "telefone";
        break;
    case "dt_nascimento":
        $coluna = "dt_nascimento";
        break;
    default:
        $coluna = "nome"; // Defina uma coluna padrão ou lide com a opção inválida de acordo com sua lógica
        break;
}

// Consulta SQL para realizar a busca
$sql = "SELECT * FROM clientes WHERE $coluna LIKE '%$textoBusca%'";

$result = $conexao->query($sql);

if ($result){
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
    echo "<br><button><a href='index.php'>Voltar para pagina inicial</a></button>";
} else {
    echo "Erro na consulta: ";
}
-$conexao->close();
