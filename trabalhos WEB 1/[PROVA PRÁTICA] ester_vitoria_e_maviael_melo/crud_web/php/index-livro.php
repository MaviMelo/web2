<?php 

require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM livros");
// Recupera todos os resultados da consulta como um array associativo
$livros = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Livros</title>
</head>
<body>
    <header>
        <h1>Biblioteca</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index-livro.php">Listar Livros</a></li>
                <li><a href="create-livro.php">Adicionar Livro</a></li>
            </ul>
        </nav>
    </header>

<table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ano de Publicação</th>
                    <th>ISBN</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Itera sobre os alunos e cria uma linha para cada aluno na tabela -->
                <?php foreach ($livros as $livro): ?>
                    <tr>
                        <!-- Exibe os dados do aluno -->
                        <td><?= $livro['id'] ?></td>
                        <td><?= $livro['nome_livro'] ?></td>
                        <td><?= $livro['publicacao'] ?></td>
                        <td><?= $livro['isbn'] ?></td>
                        <td>
                            <!-- Links para visualizar, editar e excluir o livro -->
                            <a href="read-livro.php?id=<?= $livro['id'] ?>">Visualizar</a>
                            <a href="update-livro.php?id=<?= $livro['id'] ?>">Editar</a>
                            <a href="delete-livro.php?id=<?= $livro['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
</body>
</html>