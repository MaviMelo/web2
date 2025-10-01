<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Verifica se o formulário foi submetido através do método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $nacionalidade = $_POST['nacionalidade'];
    $data_nascimento = $_POST['data_nascimento'];
    
    // Prepara a instrução SQL para inserir um novo aluno no banco de dados
    $stmt = $pdo->prepare("INSERT INTO autores (nome_altor, nacionalidade, deta_nascimento) VALUES (?, ?, ?)");
    
    // Executa a instrução SQL com os dados do formulário
    $stmt->execute([$nome, $nacionalidade, $data_nascimento]);
    
    // Redireciona para a página de listagem de alunos após a inserção
    header('Location: index-autor.php');
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Autor</title>
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de Alunos</h1>
        <nav>
           
        </nav>
    </header>

    <main>
        <h2>Adicionar Autor</h2>
        <!-- Formulário para adicionar um novo aluno -->
        <form method="POST">
            <label for="nome">Nome:</label>
            <!-- Campo para inserir o nome do aluno -->
            <input type="text" id="nome" name="nome" required>
            
            <label for="matricula">Nacionalidade:</label>
            <!-- Campo para inserir a matrícula do aluno -->
            <input type="text" id="nacionalidade" name="nacionalidade" required>
            
            <label for="data_nascimento">Data de Nascimento:</label>
            <!-- Campo para inserir a data de nascimento do aluno -->
            <input type="date" id="data_nascimento" name="data_nascimento" required>
            
            <!-- Botão para submeter o formulário -->
            <button type="submit">Adicionar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Alunos</p>
    </footer>
</body>
</html>