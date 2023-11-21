<?php

$nome = $_POST["nome_paciente"];
$email = $_POST["email_paciente"];
$dateTime = new DateTime($_POST["dt_paciente"]);
$dataFormatada = $dateTime->format('d-m-Y');


function formatarTelefone($telefone) {
    // Remover caracteres não numéricos do telefone
    $telefoneNumerico = preg_replace("/[^0-9]/", "", $telefone);

    // Adicionar os parênteses e hífen no formato desejado
    $telefoneFormatado = sprintf("(%s) %s-%s",
        substr($telefoneNumerico, 0, 2),
        substr($telefoneNumerico, 2, 5),
        substr($telefoneNumerico, 7)
    );

    return $telefoneFormatado;
}

$telefoneNv = formatarTelefone($_POST["num_paciente"]);

include("script.php");


if(mysqli_query($conexao,"INSERT INTO clientes(nome,dt_nascimento,email,telefone) VALUES('$nome','$dataFormatada','$email','$telefoneNv')")){
    echo "Sucesso";
}else{
    echo "não cadastrou";
}




?>