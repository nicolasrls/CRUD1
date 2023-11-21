<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultório NR</title>
</head>

<body>
    <h1>Bem-vindo ao sistema!</h1>
    <h3>Insira os clientes abaixo:</h3>

    <form action="cadastrar.php" method="post">
        <label for="name">Nome:</label><input type="text" name="nome_paciente">
        <label for="ema">Email:</label><input type="email" name="email_paciente">
        <label for="num">Numero:</label><input type="text" name="num_paciente" placeholder="(XX) XXXXX-XXXX" oninput="formatarTelefone(this)">
        <label for="dt">Dt de nascimento:</label><input type="date" name="dt_paciente">
        <input type="submit" value="Enviar para o BD">
    </form>

    <form action="listar.php" method="post">
        <h1>Pesquise aqui no BD</h1>
        <label for="pesquisa">Pesquise aqui por</label>
        <select name="opcoes" title="Escolha uma opção" id="opcoesSelect" required>
            <option value="nome">Nome</option>
            <option value="email">Email</option>
            <option value="dt_nascimento">Data de nascimento</option>
            <option value="telefone" selected>Telefone</option>
        </select>

        <input type="text" name="textoBusca" id="textoBuscaInput">
        <input type="submit" value="Buscar agora">
    </form>
    <br>
    <button><a href="listartudo.php">Listar Todos os Clientes</a></button>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var inputTelefone = document.querySelector('input[name="num_paciente"]');
            inputTelefone.addEventListener('input', function() {
                formatarTelefone(this);
            });
        });

        function formatarTelefone(input) {
            // Remove todos os caracteres não numéricos do valor do input
            let telefoneNumerico = input.value.replace(/\D/g, '');

            // Formata o número no estilo desejado
            let telefoneFormatado = telefoneNumerico.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');

            // Define o valor formatado de volta no input
            input.value = telefoneFormatado;
        }
        document.getElementById('opcoesSelect').addEventListener('change', function() {
            // Função a ser executada quando houver uma mudança na seleção
            var opcaoSelecionada = this.value; // Obtém o valor da opção selecionada
            // Obtém a referência ao campo de texto
            var textoBuscaInput = document.getElementById('textoBuscaInput');
            // Ajusta o placeholder com base na opção selecionada
            switch (opcaoSelecionada) {
                case 'dt_nascimento':
                    textoBuscaInput.placeholder = 'Formato: XX-XX-XXXX';
                    break;
                case 'telefone':
                    textoBuscaInput.placeholder = 'Formato: (XX) XXXXX-XXXX';
                    break;
                default:
                    // Se a opção não for "dt_nascimento" nem "telefone", remove o placeholder
                    textoBuscaInput.placeholder = '';
                    break;
            }
        });
    </script>

</body>

</html>