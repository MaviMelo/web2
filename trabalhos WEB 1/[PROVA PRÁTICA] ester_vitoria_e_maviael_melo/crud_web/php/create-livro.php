<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Verifica se o formulário foi submetido através do método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados enviados pelo formulário
    $titulo = $_POST['titulo'];
    $publicacao = $_POST['publicacao'];
    $isbn = $_POST['isbn'];
    
    // Prepara a instrução SQL para inserir um novo aluno no banco de dados
    $stmt = $pdo->prepare("INSERT INTO livros (nome_livro, publicacao, isbn) VALUES (?, ?, ?)");
    
    // Executa a instrução SQL com os dados do formulário
    $stmt->execute([$titulo, $publicacao, $isbn]);
    
    // Redireciona para a página de listagem de alunos após a inserção
    header('Location: index-livro.php');
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Livro</title>
</head>
<body>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index-livro.php">Listar Livros</a></li>
                <li><a href="create-livro.php">Adicionar Livro</a></li>
            </ul>
        </nav>

    <main>
        <h2>Adicionar Livro</h2>
        <!-- Formulário para adicionar um novo aluno -->
        <form method="POST">
            <label for="titulo">Titulo:</label>
            <!-- Campo para inserir o titulo do aluno -->
            <input type="text" id="titulo" name="titulo" required>
            
            <label for="publicacao">Ano de Publicação:</label>
            <!-- Campo para inserir a matrícula do aluno -->
            <input type="date" id="publicacao" name="publicacao" required>
            
            <label for="isbn">ISBN:</label>
            <!-- Campo para inserir a data de nascimento do aluno -->
            <input type="text" id="isbn" name="isbn" required>
            
            <!-- Botão para submeter o formulário -->
            <button type="submit">Adicionar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Alunos</p>
    </footer>
</body>
</html>