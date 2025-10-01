<?php
    //Inclui o arquivo de conexão com o banco de dados
    require_once 'db.php';

    // Obtém o ID do produto a partir da URL usando o método GET
    $id = $_GET['id'];

    // Prepara a instrução SQL para selecionar o produto pelo ID
    $stmt = $pdo->prepare("SELECT * FROM produto WHERE id = ?");
    // Executa a instrução SQL, passando o ID do produto como parâmetro
    $stmt->execute([$id]);

    // Recupera os dados do produto como um array associativo
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Produto</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de produtos</h1>
        <nav>
            <ul>
                <li><a class="buton" href="../index.php">Home</a></li>
                <li><a class="buton" href="index-produto.php">Listar produtos</a></li>
                <li><a class="buton" href="create-produto.php">Adicionar Produto</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Detalhes do Produto</h2>
        <?php if ($produto): ?>
            <!-- Exibe os detalhes do produto -->
            <p><strong>ID:</strong> <?= $produto['id'] ?></p>
            <p><strong>Nome:</strong> <?= $produto['nome'] ?></p>
            <p><strong>>Preço:</strong> <?= $produto['preco'] ?></p>
            <p><strong>Código de Barras:</strong> <?= $produto['cod_barra'] ?></p>
            <p><strong>Lote:</strong> <?= $produto['lote'] ?></p>
            <p><strong>Validade:</strong> <?= $produto['validade'] ?></p>
            <p><strong>Quantidade:</strong> <?= $produto['quantidade'] ?></p>
            <p><strong>Estocagem:</strong> <?= $produto['data_estoque'] ?></p>
             

            <p>
                <!-- Links para editar e excluir o produto -->
                <a href="update-produto.php?id=<?= $produto['id'] ?>">Editar</a>
                <a href="delete-produto.php?id=<?= $produto['id'] ?>">Excluir</a>
            </p>
        <?php else: ?>
            <!-- Exibe uma mensagem caso o produto não seja encontrado -->
            <p>produto não encontrado.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Produtos</p>
    </footer>
</body>
</html>
