<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function toggleDetails(id) {
            const details = document.getElementById('details-' + id);
            details.style.display = details.style.display === 'none' ? 'table-row' : 'none';
            const icon = document.getElementById('icon-' + id);
            icon.classList.toggle('expanded');
        }
    </script>
    <?php 
        require_once 'db.php'; 
        $database = new Database();
        $database->connect();
        $pdo = $database->getConnection(); 
    ?>
</head>
<body>
    <div class="container">
        <div class="box">
            <h1>Cadastro do Aluno</h1>
            <form action="cadastro.php" method="POST">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
                
                <label for="idade">Idade:</label>
                <input type="number" id="idade" name="idade" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="curso">Curso:</label>
                <input type="text" id="curso" name="curso" required>
                
                <input type="submit" value="Cadastrar">
            </form>
        </div>

        <h2>Alunos Cadastrados</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Email</th>
                <th>Curso</th>
                <th>Ação</th>
            </tr>
            <?php
            $stmt = $pdo->prepare("SELECT * FROM alunos");
            $stmt->execute();
            $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($alunos as $aluno) {
                echo "<tr onclick='toggleDetails(" . $aluno['id'] . ")' style='cursor: pointer;'>";
                echo "<td>" . $aluno['id'] . "</td>";
                echo "<td>" . $aluno['nome'] . "</td>";
                echo "<td>" . $aluno['idade'] . "</td>";
                echo "<td>" . $aluno['email'] . "</td>";
                echo "<td>" . $aluno['curso'] . "</td>";
                echo "<td><a href='deletar.php?id=" . $aluno['id'] . "'>Excluir</a></td>";
                echo "</tr>";
                
                // Linha oculta para mais detalhes
                echo "<tr id='details-" . $aluno['id'] . "' style='display: none;'>";
                echo "<td colspan='6'>Aqui você pode adicionar mais informações sobre o aluno.</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

