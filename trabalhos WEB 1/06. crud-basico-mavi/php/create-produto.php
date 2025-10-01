<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Verifica se o formulário foi submetido através do método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $cod_barra = $_POST['cod_barra'];
    $lote = $_POST['lote'];
    $quantidade = $_POST['quantidade'];
    $validade = $_POST['validade'];
    
    // Prepara a instrução SQL para inserir um novo produto no banco de dados
    $stmt = $pdo->prepare("INSERT INTO produto (nome, preco, cod_barra, lote, quantidade, validade) VALUES (?, ?, ?, ?, ?, ?)");
    
    // Executa a instrução SQL com os dados do formulário
    $stmt->execute([$nome, $preco, $cod_barra, $lote, $quantidade, $validade]);
    
    // Redireciona para a página de listagem de produtos opós a inserção
    header('Location: index-produto.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar produto</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de Produtos</h1>
        <nav>
            <ul>
                <li><a class="buton" href="../index.php">Home</a></li>
                <li><a class="buton" href="index-produto.php">Listar produtos</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Adicionar produto</h2>
        <!-- Formulário para adicionar um novo produto -->
        <form class="tabela", method="POST">
            <label for="nome">Descrição:</label>
            <!-- Campo para inserir o nome do produto -->
            <input type="text" id="nome" name="nome" required>
            <br>

            <label for="preco">Preço:</label>
            <!-- Campo para inserir preço do produto -->
              <input type="number" id="preco" name="preco" step="0.01" min="0" max="99999999.99" placeholder="0.00 (usar ponto)" required>
            <br>
            
            <label for="lote">Lote:</label>
            <!-- Campo para inserir o lote do produto -->
            <input type="number" id="lote" name="lote" required>
            <br>
            
            
            <label for="quantidade">Quantidade:</label>
            <!-- Campo para inserir a quantidade do produto -->
            <input type="number" id="quantidade" name="quantidade" required>
            <br>
            
            <label for="validade">Validade:</label>
            <input type="date" id="validade" name="validade" required>
            <br>
            

            <label for="cod_barra">Código de barras:</label>
            <input type="text" id="cod_barra" name="cod_barra" pattern="[0-9]{13}" required placeholder="13 (treze) dígitos">
            <br>
            
            
            <!-- Botão para submeter o formulário -->
            <button type="submit">Adicionar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Produtos</p>
    </footer>
</body>
</html>
