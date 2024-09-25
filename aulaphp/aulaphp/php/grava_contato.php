<html>
    <body>
<?php 
    $host = 'localhost';
    $db = 'senai_ta_aulaphp';
    $user = 'Clara';
    $pass = '123456';
    $port = 3307; // Porta MySQL correta
    // Inclui o arquivo da classe Database que criamos para conectar dentro da pasta php
    require_once 'connection.php';
    // Cria uma instância da classe Database
    $database = new Database($host, $db, $user, $pass, $port);
    // Chama o método connect para estabelecer a conexão
    $database->connect();
    // Obtém a instância PDO para realizar consultas
    $pdo = $database->getConnection();

    // Verifica se os dados foram enviados via GET
    if (isset($_GET['nome']) && isset($_GET['email']) && isset($_GET['mensagem'])){
        // Captura os dados enviados pelo formulário
        $nome = htmlspecialchars($_GET['nome']);
        $email = htmlspecialchars($_GET['email']);
        $mensagem = htmlspecialchars($_GET['mensagem']);
        $senha = htmlspecialchars($_GET['senha']);

        //exibe os dados capturados 
        echo "<h2>Informações Recebidas:</h2>";
        echo "<p><Strong>Nome:</strong>" . $nome . "</p>";
        echo "<p><Strong>E-mail:</strong>" . $email . "</p>";
        echo "<p><Strong>Mensagem:</strong>" . $mensagem . "</p>";
        echo "<p><Strong>Senha:</strong>" . $senha . "</p>";
        // Verifica se a variável $pdo, que deve ser una instãncia de PDO, está definida e é válida
        // Prepara uma consulta SQL para selecionar as colunas 'id' e 'nome' da tabela 'usuario'
        $stmt = $pdo->prepare("insert into senai_ta_aulaphp.mensagens(nome, email, mensagem, senha)values('$nome', '$email', '$mensagem', '$senha');");

            // Executa a consulta preparada
            $stmt->execute();
    } else{
        echo "Nenhum dado foi enviado";
    }
    ?>
    </body>
    </html>