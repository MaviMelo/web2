<?php
    // Inclui o arquivo de conexão com o banco de dados
    require_once 'db.php';

    // Obtém o ID do aluno a partir da URL usando o método GET
    $id = $_GET['id'];

    // Prepara a instrução SQL para selecionar o aluno pelo ID
    $stmt = $pdo->prepare("SELECT * FROM livros WHERE id = ?");
    // Executa a instrução SQL, passando o ID do aluno como parâmetro
    $stmt->execute([$id]);

    // Recupera os dados do aluno como um array associativo
    $livro = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Livro</title>
</head>
<body>

    <main>
        <h2>Detalhes do Livro</h2>
        <?php if ($livro): ?>
            <!-- Exibe os detalhes do aluno -->
            <p><strong>ID:</strong> <?= $livro['id'] ?></p>
            <p><strong>Nome:</strong> <?= $livro['nome_livro'] ?></p>
            <p><strong>Ano de Publicação:</strong> <?= $livro['publicacao'] ?></p>
            <p><strong>ISBN:</strong> <?= $livro['isbn'] ?></p>
            <p>
                <!-- Links para editar e excluir o livro$livro -->
                <a href="update-livro.php?id=<?= $livro['id'] ?>">Editar</a>
                <a href="delete-livro.php?id=<?= $livro['id'] ?>">Excluir</a>
            </p>
        <?php else: ?>
            <!-- Exibe uma mensagem caso o aluno não seja encontrado -->
            <p>Autor não encontrado.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Alunos</p>
    </footer>
</body>
</html>