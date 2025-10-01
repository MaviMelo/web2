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

// Verifica se o formulário foi submetido através do método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $publicacao = $_POST['publicacao'];
    $isbn = $_POST['isbn'];
    
    // Prepara a instrução SQL para atualizar os dados do aluno
    $stmt = $pdo->prepare("UPDATE livros SET nome_livro = ?, publicacao = ?, isbn = ? WHERE id = ?");
    
    // Executa a instrução SQL com os novos dados do formulário
    $stmt->execute([$nome, $publicacao, $isbn, $id]);
    
    // Redireciona para a página de listagem de alunos após a atualização
    header('Location: index-livro.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro</title>
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
        <h2>Editar Autor</h2>
        <!-- Formulário para editar os dados do aluno -->
        <form method="POST">
            <label for="nome">Nome:</label>
            <!-- Campo para inserir o nome do aluno -->
            <input type="text" id="nome" name="nome" value="<?= $livro['nome_livro'] ?>" required>
            
            <label for="publicacao">Ano de Publicação:</label>
            <!-- Campo para inserir a matrícula do livro$livro -->
            <input type="text" id="publicacao" name="publicacao" value="<?= $livro['publicacao'] ?>" required>
            
            <label for="dataNascimento">Data de Nascimento:</label>
            <!-- Campo para inserir a data de nascimento do livro$livro -->
            <input type="text" id="isbn" name="isbn" value="<?= $livro['isbn'] ?>" required>
          
            <!-- Botão para submeter o formulário -->
            <button type="submit">Atualizar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de </p>
    </footer>
</body>
</html>