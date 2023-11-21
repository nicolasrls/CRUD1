<?php

include("script.php");

// Obter a opção selecionada
$opcaoSelecionada = $_POST["opcao"];
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

if ($result) {
    // Exibir os dados de cada pessoa
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Nome: " . $row["nome"] . " - Email: " . $row["email"] . " - Telefone: " . $row["telefone"] . " - Data Nascimento: " . $row["dt_nascimento"] . "<br>";
    }
}else{
    echo "Erro na consulta: ";
}
-
$conexao->close();

?>