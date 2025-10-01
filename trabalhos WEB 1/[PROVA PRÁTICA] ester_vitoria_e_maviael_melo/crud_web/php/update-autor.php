<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Obtém o ID do aluno a partir da URL usando o método GET
$id = $_GET['id'];

// Prepara a instrução SQL para selecionar o aluno pelo ID
$stmt = $pdo->prepare("SELECT * FROM autores WHERE id = ?");

// Executa a instrução SQL, passando o ID do aluno como parâmetro
$stmt->execute([$id]);

// Recupera os dados do aluno como um array associativo
$autor = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se o formulário foi submetido através do método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $nacionalidade = $_POST['nacionalidade'];
    $data_nascimento = $_POST['data_nascimento'];
    
    // Prepara a instrução SQL para atualizar os dados do aluno
    $stmt = $pdo->prepare("UPDATE autores SET nome_altor = ?, nacionalidade = ?, deta_nascimento = ? WHERE id = ?");
    
    // Executa a instrução SQL com os novos dados do formulário
    $stmt->execute([$nome, $nacionalidade, $data_nascimento, $id]);
    
    // Redireciona para a página de listagem de alunos após a atualização
    header('Location: index-autor.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Autor</title>
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de Alunos</h1>
       
    </header>

    <main>
        <h2>Editar Autor</h2>
        <!-- Formulário para editar os dados do aluno -->
        <form method="POST">
            <label for="nome">Nome:</label>
            <!-- Campo para inserir o nome do aluno -->
            <input type="text" id="nome" name="nome" value="<?= $autor['nome_altor'] ?>" required>
            
            <label for="matricula">Nacionalidade:</label>
            <!-- Campo para inserir a matrícula do autor$autor -->
            <input type="text" id="nacionalidade" name="nacionalidade" value="<?= $autor['nacionalidade'] ?>" required>
            
            <label for="dataNascimento">Data de Nascimento:</label>
            <!-- Campo para inserir a data de nascimento do autor$autor -->
            <input type="date" id="data_nascimento" name="data_nascimento" value="<?= $autor['deta_nascimento'] ?>" required>
          
            <!-- Botão para submeter o formulário -->
            <button type="submit">Atualizar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de </p>
    </footer>
</body>
</html>