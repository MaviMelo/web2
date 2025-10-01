<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Obtém o ID do produto a partir da URL usando o método GET
$id = $_GET['id'];

// Prepara a instrução SQL para selecionar o produto pelo ID
$stmt = $pdo->prepare("SELECT * FROM produto WHERE id = ?");

// Executa a instrução SQL, passando o ID do produto como parâmetro
$stmt->execute([$id]);

// Recupera os dados do produto como um array associativo
$produto = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se o formulário foi submetido através do método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $cod_barra = $_POST['cod_barra'];
    $lote = $_POST['lote'];
    $quantidade = $_POST['quantidade'];
    $validade = $_POST['validade'];
    
    // Prepara a instrução SQL para atualizar os dados do produto
    $stmt = $pdo->prepare("UPDATE produto SET nome = ?, preco = ?, cod_barra = ?, lote = ?, quantidade = ?, validade = ? WHERE id = ?");
    
    // Executa a instrução SQL com os novos dados do formulário
    $stmt->execute([$nome, $preco, $cod_barra, $lote, $quantidade, $validade, $id]);
    
    // Redireciona para a página de listagem de produto após a atualização
    header('Location: index-produto.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produto</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de produtos</h1>
        <nav>
            <ul>
                <li><a class="buton" href="../index.php">Home</a></li>
                <li><a class="buton" href="index-produto.php">Listar Produtos</a></li>
                <li><a class="buton" href="create-produto.php">Adicionar Produto</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Editar Produto</h2>
        <!-- Formulário para editar os dados do produto -->
        <form method="POST">
            <label for="nome">Nome:</label>
            <!-- Campo para inserir o nome do produto -->
            <input type="text" id="nome" name="nome" value="<?= $produto['nome'] ?>" required>
            <br>         
            
<label for="preco">Preço:</label>
            <!-- Campo para inserir preço do produto -->
            <input type="text" id="preco" name="preco" step="0.01" min="0" value="<?= $produto['preco'] ?>" required>
            <br>        
            
<label for="cod_barra">Código de Barras:</label>
            <!-- Campo para inserir código de barras -->
            <input type="text" id="cod_barra" name="cod_barra" pattern="[0-9]{13}" value="<?= $produto['cod_barra'] ?>" required>
            <br>    

            <label for="lote">Lote:</label>
            <!-- Campo para inserir o lote do produto -->
            <input type="number" id="lote" name="lote" value="<?= $produto['lote'] ?>" required>
            <br>
            
<label for="quantidade">Quantidade:</label>
            <!-- Campo para inserir qantidade do produto -->
            <input type="number" id="quantidade" name="quantidade" value="<?= $produto['quantidade'] ?>" required>
            <br>
            
<label for="validade">Validade:</label>
            <!-- Campo para inserir a validade do produto -->
            <input type="date" id="validade" name="validade" value="<?= $produto['validade'] ?>" required>
            <br>        
          
  <!-- Botão para submeter o formulário -->
            <button type="submit">Atualizar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de produto</p>
    </footer>
</body>
</html>
