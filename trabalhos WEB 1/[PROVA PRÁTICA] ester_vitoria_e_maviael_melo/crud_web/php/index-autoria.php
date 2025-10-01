<?php 

require_once 'db.php';

$stmt = $pdo->query("SELECT 
                        autorias.*,
                        autores.id as id_autor,    
                        autores.nome_altor AS nome_autor,
                        livros.id as id_livro,
                        livros.nome_livro as nome_livro
                     FROM
                         autorias
                     LEFT JOIN autores ON autorias.autor_id = autores.id
                     LEFT JOIN livros ON autorias.livro_id = livros.id ");
$autorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Autoria</title>
</head>
<body>
    <header>
        <h1>Biblioteca</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index-autoria.php">Listar Autorias</a></li>
                <li><a href="create-autoria.php">Adicionar Autoria</a></li>
            </ul>
        </nav>
    </header>

<table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Autor ID</th>
                    <th>Livro ID</th>
                    <th>Autor Principal</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Itera sobre os alunos e cria uma linha para cada aluno na tabela -->
                <?php foreach ($autorias as $autoria): ?>
                    <tr>
                        <!-- Exibe os dados do aluno -->
                        <td><?= $autoria['id'] ?></td>
                        <td><?= $autoria['id_autor'] ?></td>
                        <td><?= $autoria['id_livro'] ?></td>
                        <td><?= $autoria['autor_principal'] ?></td>
                        <td>
                            <!-- Links para visualizar, editar e excluir o autoria -->
                            <a href="read-autoria.php?id=<?= $autoria['id'] ?>">Visualizar</a>
                            <a href="update-autoria.php?id=<?= $autoria['id'] ?>">Editar</a>
                            <a href="delete-autoria.php?id=<?= $autoria['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
</body>
</html>