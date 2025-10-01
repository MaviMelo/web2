<?php 

require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM autores");
// Recupera todos os resultados da consulta como um array associativo
$autores = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Autor</title>
</head>
<body>
    <header>
        <h1>Biblioteca</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index-autor.php">Listar Alunos</a></li>
                <li><a href="create-autor.php">Adicionar Aluno</a></li>
            </ul>
        </nav>
    </header>

<table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Nacionalidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Itera sobre os alunos e cria uma linha para cada aluno na tabela -->
                <?php foreach ($autores as $autor): ?>
                    <tr>
                        <!-- Exibe os dados do aluno -->
                        <td><?= $autor['id'] ?></td>
                        <td><?= $autor['nome_altor'] ?></td>
                        <td><?= $autor['nacionalidade'] ?></td>
                        <td><?= $autor['deta_nascimento'] ?></td>
                        <td>
                            <!-- Links para visualizar, editar e excluir o autor -->
                            <a href="read-autor.php?id=<?= $autor['id'] ?>">Visualizar</a>
                            <a href="update-autor.php?id=<?= $autor['id'] ?>">Editar</a>
                            <a href="delete-autor.php?id=<?= $autor['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
</body>
</html>